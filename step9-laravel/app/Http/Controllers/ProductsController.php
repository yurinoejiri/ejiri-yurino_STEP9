<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function create()
    {
        return view('create');
    }
    public function store(ProductsRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Products::create($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        }

        return redirect()->route('index')->with('商品が登録されました');
    }
}
