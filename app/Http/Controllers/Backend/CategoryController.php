<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\CategoryTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        check_permission('categories index');
        $categories = Category::all();
        return view('backend.categories.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('categories create');
        $categories = Category::all();
        return view('backend.categories.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('categories create');
        try {
            if ($request->has('parent')) {
                $parentCategory = Category::find($request->parent);
                $category = new Category();
                $category->slug = $request->slug;
                $parentCategory->subcategories()->save($category);
            } else {
                $category = new Category();
                $category->slug = $request->slug;
                $category->save();
            }
            $category->is_home = $request->has('is_home') ? 1 : 0;
            foreach (active_langs() as $lang) {
                $translation = new CategoryTranslation();
                $translation->locale = $lang->code;
                $translation->category_id = $category->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->meta_title = $request->meta_title[$lang->code];
                $translation->meta_description = $request->meta_description[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.categories.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.categories.index'));
        }
    }

    public
    function edit(string $id)
    {
        check_permission('categories edit');
        $category = Category::where('id', $id)->first();
        $categories = Category::whereNotIn('id', [$id])->get();
        return view('backend.categories.edit', get_defined_vars());
    }

    public
    function update(Request $request, string $id)
    {
        check_permission('categories edit');
        try {
            $category = Category::find($id);
            DB::transaction(function () use ($request, $category) {
                foreach (active_langs() as $lang) {
                    $category->translate($lang->code)->name = $request->name[$lang->code];
                    $category->translate($lang->code)->description = $request->description[$lang->code];
                    $category->translate($lang->code)->meta_description = $request->meta_description[$lang->code];
                    $category->translate($lang->code)->meta_title = $request->meta_title[$lang->code];
                }
                $category->is_home = $request->has('is_home') ? 1 : 0;
                $category->parent_id = $request->parent;
                $category->slug = $request->slug;
                $category->save();
            });
            alert()->success(__('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect()->back();
        }
    }

    public
    function status(string $id)
    {
        check_permission('categories edit');
        return CRUDHelper::status('\App\Models\Category', $id);
    }

    public
    function delete(string $id)
    {
        check_permission('categories delete');
        return CRUDHelper::remove_item('\App\Models\Category', $id);
    }
}
