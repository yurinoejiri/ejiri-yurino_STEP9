<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use App\Models\Products;
use App\Models\Users;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();

        return view('index', compact('products'));
    }

    public function mypage()
    {
        $user_id = Auth::id();

        $users = Auth::user();

        $products = Products::getOwnProducts($user_id);

        // 購入した商品の一覧を出すコードを後で書く

        return view('mypage', compact('users', 'products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(ProductsRequest $request)
    {
        $validatedData = $request->validated();

        //後でユーザーログインして開くように修正する。
        $validatedData['user_id'] = auth()->id();

        Products::create($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        }

        return redirect()->route('index')->with('商品が登録されました');
    }
}
