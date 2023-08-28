<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function deletePhoto($modelName, $id)
    {
        check_permission(Str::lower($modelName) . ' delete');
        return CRUDHelper::remove_item('\App\Models\\' . $modelName . 'Photos', $id);
    }
}
