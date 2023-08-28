<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        if (About::where('status', 1)->exists()) {
            return response()->json(['about' => About::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['about' => 'About-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (About::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['about' => About::where('status', 1)->where('id', $id)->with('photos')->first()], 200);
        } else {
            return response()->json(['about' => 'about-is-not-founded'], 404);
        }
    }
}
