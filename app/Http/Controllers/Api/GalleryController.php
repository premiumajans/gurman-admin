<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        if (Gallery::where('status', 1)->exists()) {
            return response()->json(Gallery::where('status', 1)->get(), 200);
        } else {
            return response()->json(['message' => 'Gallery-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Gallery::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(Gallery::where('status', 1)->where('id', $id)->first(), 200);
        } else {
            return response()->json(['message' => 'gallery-is-not-founded'], 404);
        }
    }
}
