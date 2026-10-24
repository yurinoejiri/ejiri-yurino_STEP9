<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Products;
use App\Http\Requests\ProductsRequest;

class LikeController extends Controller
{
    public function likeProduct(Request $request, Products $product)
    {
        $user = Auth::user();

        if (!$product->likedBy($user)) {
            Like::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
            ]);
        }

        return response()->json([
            'likesCount' => $product->likes()->count(),
        ]);
    }

    public function unlikeProduct(Request $request, Products $product)
    {
        $user = Auth::user();

        if ($product->likedBy($user)) {
            Like::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->delete();
        }

        return response()->json([
            'likesCount' =>$product->likes()->count(),
        ]);
    }
}
