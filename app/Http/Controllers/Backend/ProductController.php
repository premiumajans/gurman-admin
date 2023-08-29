<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\Category;
use App\Models\ProductPhotos;
use App\Models\ProductTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        check_permission('product index');
        $products = Product::all();
        return view('backend.product.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('product create');
        $categories = Category::where('status', 1)->get();
        return view('backend.product.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('product create');
        try {
            $category = Category::find($request->category_id);
            $product = new Product();
            $product->photo = upload('product', $request->file('photo'));
            $category->product()->save($product);
            if ($request->has('name') or $request->has('description')) {
                foreach (active_langs() as $lang) {
                    $translation = new ProductTranslation();
                    $translation->locale = $lang->code;
                    $translation->product_id = $product->id;
                    $translation->name = $request->name[$lang->code] ?? null;
                    $translation->description = $request->description[$lang->code] ?? null;
                    $translation->save();
                }
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.product.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.product.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('product edit');
        $product = Product::where('id', $id)->with('photos')->first();
        return view('backend.product.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('product edit');
        try {
            $product = Product::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $product) {
                if ($request->hasFile('photo')) {
                    if (file_exists($product->photo)) {
                        unlink(public_path($product->photo));
                    }
                    $product->photo = upload('product', $request->file('photo'));
                }
                if ($request->has('name') or $request->has('description')) {
                    foreach (active_langs() as $lang) {
                        $product->translate($lang->code)->name = $request->name[$lang->code] ?? null;
                        $product->translate($lang->code)->description = $request->description[$lang->code] ?? null;
                    }
                }
                $product->save();
            });
            alert()->success(__('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect()->back();
        }
    }

    public function status(string $id)
    {
        check_permission('product edit');
        return CRUDHelper::status('\App\Models\Product', $id);
    }

    public function delete(string $id)
    {
        check_permission('product delete');
        return CRUDHelper::remove_item('\App\Models\Product', $id);
    }
}
