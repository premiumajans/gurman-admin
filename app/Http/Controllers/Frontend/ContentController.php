<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function show($slug): View
    {
        $content = Content::where('slug', $slug)->with('category')->first();
        if (empty($content)) {
            return abort(404);
        }
        $content->increment('view');
        $relatedContents = Content::where('category_id', '=', $content->category->id)->where('id', '<>', $content->id)->get();
        return view('frontend.content.show', get_defined_vars());
    }
}
