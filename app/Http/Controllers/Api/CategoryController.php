<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        if (Category::where('status', 1)->exists()) {
            return response()->json(['category' => Category::where('status', 1)->with('product')->get()], 200);
        } else {
            return response()->json(['category' => 'category-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Category::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['category' => Category::where('status', 1)->where('id', $id)->with('product')->first()], 200);
        } else {
            return response()->json(['category' => 'category-is-not-founded'], 404);
        }
    }
}
