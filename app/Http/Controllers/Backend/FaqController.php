<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\FaqPhotos;
use App\Models\FaqTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index()
    {
        check_permission('faq index');
        $faqs = Faq::all();
        return view('backend.faq.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('faq create');
        return view('backend.faq.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('faq create');
        try {
            $faq = new Faq();
            $faq->save();
            foreach (active_langs() as $lang) {
                $translation = new FaqTranslation();
                $translation->locale = $lang->code;
                $translation->faq_id = $faq->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->schema = $request->schema[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.faq.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.faq.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('faq edit');
        $faq = Faq::find($id);
        return view('backend.faq.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('faq edit');
        try {
            $faq = Faq::find($id);
            DB::transaction(function () use ($request, $faq) {
                foreach (active_langs() as $lang) {
                    $faq->translate($lang->code)->name = $request->name[$lang->code];
                    $faq->translate($lang->code)->description = $request->description[$lang->code];
                    $faq->translate($lang->code)->schema = $request->schema[$lang->code];
                }
                $faq->save();
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
        check_permission('faq edit');
        return CRUDHelper::status('\App\Models\Faq', $id);
    }

    public function delete(string $id)
    {
        check_permission('faq delete');
        return CRUDHelper::remove_item('\App\Models\Faq', $id);
    }
}
