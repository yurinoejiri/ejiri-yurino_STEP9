<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\SalesRequest;
use App\Models\Products;
use App\Models\Users;
use App\Models\Sales;

class ProductsController extends Controller
{
    // 一覧表示　ーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function index()
    {
        $user_id = Auth::id();

        $products = Products::getOtherProducts($user_id);

        return view('index', compact('products'));
    }

    // 検索機能　ーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function search(Request $request)
    {
        $query = Products::query()
            ->where('user_id', '!=', Auth::id());

        if ($request->filled('product_name')) {
            $query->where('product_name', 'like', '%' . $request->product_name . '%');
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->get();

        return view('index', compact('products'));
    }


    // マイページ　ーーーーーーーーーーーーーーーーーーーーーーーーー
    public function mypage()
    {
        $user_id = Auth::id();

        $users = Auth::user();

        $products = Products::getOwnProducts($user_id);

        $sales = Sales::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
            

        return view('mypage', compact('users', 'products', 'sales'));
    }

    // 商品詳細　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function salesDetail($id)
    {
        $product = Products::findOrFail($id);

        return view('sales_detail', compact('product'));
    }

    // 購入　ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function sales($id)
    {
        $product = Products::findOrFail($id);

        return view('sales', compact('product'));
    }

    public function purchase(SalesRequest $request, $id)
    {
        $validatedData = $request->validated();

        $quantity = (int) $request->quantity;

        try {
            DB::transaction(function () use ($id, $quantity) {

                $product = Products::lockForUpdate()->findOrFail($id);

                if ($product->stock < $quantity) {
                    throw new \Exception('在庫が足りません!');
                }

                $product->stock -= $quantity;
                $product->save();

                Sales::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'total_price' => $product->price * $quantity,
                ]);
            });
        } catch (\Exception $e) {
            return back()->withErrors(['quantity' => $e->getMessage()]);
        }

        return redirect()->route('index')->with('success', '購入が完了しました。');
    }

    public function apiPurchase(SalesRequest $request)
    {
        $validatedData = $request->validated();

        $productId = $request->product_id;
        $quantity = (int) $request->quantity;

        try {
            DB::transaction(function () use ($productId, $quantity) {
                $product = Products::lockForUpdate()->findOrFail($productId);

                if ($product->stock < $quantity) {
                    throw new \Exception('在庫が足りません！');
                }

                $product->stock -= $quantity;
                $product->save();

                Sales::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'total_price' => $product->price * $quantity,
                ]);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }

        return response()->json(['message' => '購入が完了しました。'], 201);
    }

    // 出品商品詳細画面 　ーーーーーーーーーーーーーーーーーーーーーーーーー
    public function show($id)
    {
        $product = Products::findOrFail($id);

        return view('detail', compact('product'));
    }

    // 更新　ーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        
        return view('edit', compact('product'));
    }

    public function update(ProductsRequest $request, $id)
    {
        $validatedData = $request->validated();

        $product = Products::findOrFail($id);

        $product->product_name = $validatedData['product_name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];


        //画像がアップロードされた場合の処理
        if ($request->hasFile('img_path')) {
            
            // 既存の画像を削除
            if($product->img_path) {
                Storage::disk('public')->delete($product->img_path);
            }

            // 画像を保存
            $image_Path = $request->file('img_path')->store('img_path', 'public');
            $product->img_path = $image_Path;
        }

        $product->save();

        return redirect()->route('detail', $id)->with('success', '商品情報が更新されました。');
    }

    // 削除　ーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        $product->likes()->delete();
        $product->sales()->delete();
        $product->delete();

        return redirect()->route('mypage')->with('success', '商品が削除されました。');
    }

    // 新規登録　ーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function create()
    {
        return view('create');
    }

    public function store(ProductsRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        $product = Products::create($validatedData);

        //画像処理
        if ($request->hasFile('img_path')) {
            $image_Path = $request->file('img_path')->store('products', 'public');
            $product->img_path = $image_Path;
        }

        $product->save();

        return redirect()->route('index')->with('商品が登録されました');
    }
}
