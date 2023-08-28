<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug): View
    {
        $category = Category::where('slug', $slug)->with('content')->first();
        if (empty($category)) {
            return abort(404);
        }
        $contents = $category->content()->paginate(9);

        return view('frontend.content.index', get_defined_vars());
    }
}
