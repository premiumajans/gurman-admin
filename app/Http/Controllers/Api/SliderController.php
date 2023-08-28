<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        if (Slider::where('status', 1)->exists()) {
            return response()->json(['slider' => Slider::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['slider' => 'Slider-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Slider::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['slider' => Slider::where('status', 1)->where('id', $id)->with('photos')->first()], 200);
        } else {
            return response()->json(['slider' => 'slider-is-not-founded'], 404);
        }
    }
}
