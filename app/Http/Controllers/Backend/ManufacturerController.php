<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\ManufacturerPhotos;
use App\Models\ManufacturerTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    public function index()
    {
        check_permission('manufacturer index');
        $manufacturers = Manufacturer::all();
        return view('backend.manufacturer.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('manufacturer create');
        return view('backend.manufacturer.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('manufacturer create');

        try {
            $manufacturer = new Manufacturer();
            $manufacturer->photo = upload('manufacturer', $request->file('photo'));
            $manufacturer->link = $request->link;
            $manufacturer->save();
            foreach (active_langs() as $lang) {
                $translation = new ManufacturerTranslation();
                $translation->locale = $lang->code;
                $translation->manufacturer_id = $manufacturer->id;
                $translation->name = $request->name[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.manufacturer.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.manufacturer.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('manufacturer edit');
        $manufacturer = Manufacturer::where('id', $id)->first();
        return view('backend.manufacturer.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('manufacturer edit');
        try {
            $manufacturer = Manufacturer::where('id', $id)->first();
            DB::transaction(function () use ($request, $manufacturer) {
                if ($request->hasFile('photo')) {
                    if (file_exists($manufacturer->photo)) {
                        unlink(public_path($manufacturer->photo));
                    }
                    $manufacturer->photo = upload('manufacturer', $request->file('photo'));
                }
                $manufacturer->link = $request->link;
                foreach (active_langs() as $lang) {
                    $manufacturer->translate($lang->code)->name = $request->name[$lang->code];
                }
                $manufacturer->save();
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
        check_permission('manufacturer edit');
        return CRUDHelper::status('\App\Models\Manufacturer', $id);
    }

    public function delete(string $id)
    {
        check_permission('manufacturer delete');
        return CRUDHelper::remove_item('\App\Models\Manufacturer', $id);
    }
}
