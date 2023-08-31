<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        if (Product::where('status', 1)->exists()) {
            return response()->json(['products' => Category::where('status', 1)->with('product')->get()], 200);
        } else {
            return response()->json(['message' => 'product-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Product::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(Product::where('status', 1)->where('id', $id)->with('product')->first(), 200);
        } else {
            return response()->json(['message' => 'product-is-not-founded'], 404);
        }
    }
}
