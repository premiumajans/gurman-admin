<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function index()
    {
        if (Manufacturer::where('status', 1)->exists()) {
            return response()->json(['manufacturers' => Manufacturer::where('status', 1)->get()], 200);
        } else {
            return response()->json(['message' => 'Manufacturer-is-empty'], 404);
        }
    }

    public function show($id)
    {
        if (Manufacturer::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(Manufacturer::where('status', 1)->where('id', $id)->first(), 200);
        } else {
            return response()->json(['message' => 'manufacturer-is-not-founded'], 404);
        }
    }
}
