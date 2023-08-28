<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\GalleryPhotos;
use App\Models\GalleryTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        check_permission('gallery index');
        $gallerys = Gallery::all();
        return view('backend.gallery.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('gallery create');
        return view('backend.gallery.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('gallery create');
        try {
            $gallery = new Gallery();
            $gallery->photo = upload('gallery', $request->file('photo'));
            $gallery->save();
            alert()->success(__('messages.success'));
            return redirect(route('backend.gallery.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.gallery.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('gallery edit');
        $gallery = Gallery::where('id', $id)->first();
        return view('backend.gallery.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('gallery edit');
        try {
            $gallery = Gallery::where('id', $id)->first();
            DB::transaction(function () use ($request, $gallery) {
                if ($request->hasFile('photo')) {
                    if (file_exists($gallery->photo)) {
                        unlink(public_path($gallery->photo));
                    }
                    $gallery->photo = upload('gallery', $request->file('photo'));
                }
                $gallery->save();
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
        check_permission('gallery edit');
        return CRUDHelper::status('\App\Models\Gallery', $id);
    }

    public function delete(string $id)
    {
        check_permission('gallery delete');
        return CRUDHelper::remove_item('\App\Models\Gallery', $id);
    }
}
