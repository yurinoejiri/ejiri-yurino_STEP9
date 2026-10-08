<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Products;
use App\Models\Users;

class ProductsController extends Controller
{
    // 一覧表示　ーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function index()
    {
        $products = Products::all();

        return view('index', compact('products'));
    }


    // マイページ　ーーーーーーーーーーーーーーーーーーーーーーーーー
    public function mypage()
    {
        $user_id = Auth::id();

        $users = Auth::user();

        $products = Products::getOwnProducts($user_id);

        // 購入した商品の一覧を出すコードを後で書く

        return view('mypage', compact('users', 'products'));
    }

    // 詳細画面 　ーーーーーーーーーーーーーーーーーーーーーーーーー
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
        $product->delete();

        return redirect()->route('index')->with('souccess', '商品が削除されました。');
    }

    // 新規登録　ーーーーーーーーーーーーーーーーーーーーーーーーーー
    public function create()
    {
        return view('create');
    }

    public function store(ProductsRequest $request)
    {
        $validatedData = $request->validated();

        //後でユーザーログインして開くように修正する。
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
