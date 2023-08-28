<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\MetaTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Meta;
use Illuminate\Support\Facades\DB;

class MetaController extends Controller
{
    protected array $pages = ['all' => 'all', 'index' => 'home-page', 'selectedContent' => 'content', 'about' => 'about', 'contact-us-page' => 'contact-us'];

    public function index()
    {
        check_permission('meta index');
        $metas = Meta::all();
        return view('backend.meta.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('meta create');
        $pages = $this->pages;
        return view('backend.meta.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('meta create');
        try {
            $meta = new Meta();
            $meta->page = $request->page;
            $meta->save();
            foreach (active_langs() as $lang) {
                $translation = new MetaTranslation();
                $translation->locale = $lang->code;
                $translation->meta_id = $meta->id;
                $translation->tag = $request->tag[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.meta.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.meta.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('meta edit');
        $meta = Meta::find($id);
        $pages = $this->pages;
        return view('backend.meta.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('meta edit');
        try {
            $meta = Meta::find($id);
            $meta->page = $request->page;
            DB::transaction(function () use ($request, $meta) {
                foreach (active_langs() as $lang) {
                    $meta->translate($lang->code)->tag = $request->tag[$lang->code];
                }
                $meta->save();
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
        check_permission('meta edit');
        return CRUDHelper::status('\App\Models\Meta', $id);
    }

    public function delete(string $id)
    {
        check_permission('meta delete');
        return CRUDHelper::remove_item('\App\Models\Meta', $id);
    }
}
