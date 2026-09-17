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
}
