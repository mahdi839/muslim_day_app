<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Dua_category;

use App\Models\Dua_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DuaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dua_contents = Dua_Item::all();
        return view('dua_items.index', compact('dua_contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dua_category = Dua_category::all();
        return view('dua_items.create', compact('dua_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {


        $request->validate([
            'select_category' => 'required',
            'dua_item_title_bn' => 'required',
            'subtitle_bn' => 'required',
            'arabic_dua' => 'required',
            'sanad_bn' => 'required',
            'matan_bn' => 'required',
            'translation_bn' => 'required',
            'reference_bn' => 'required',
            'dua_item_row_html' => 'required',
            'explanation' => 'required',
        ]);
        Dua_Item::insert([

            "dua_category_id" => $request->select_category,
            "dua_item_title_bn" => $request->dua_item_title_bn,
            "subtitle_bn" => $request->subtitle_bn,
            "arabic_dua" => $request->arabic_dua,
            "sanad_bn" => $request->sanad_bn,
            "matan_bn" => $request->matan_bn,
            "translation_bn" => $request->translation_bn,
            "reference_bn" => $request->reference_bn,
            'dua_item_row_html' => $request->dua_item_row_html,
            'explanation' => $request->explanation,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Successfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dua_Item $dua_Item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dua_Item $dua_Item, $id)
    {
        $dua_category = Dua_category::all();
        $updated_dua_item =  Dua_Item::where('id', $id)->first();
        return view('dua_items.edit', compact('updated_dua_item', 'dua_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dua_Item $dua_Item)
    {

        $dua_Item->dua_category_id = $request->select_category;
        $dua_Item->dua_item_title_bn = $request->dua_item_title_bn;
        $dua_Item->subtitle_bn = $request->subtitle_bn;
        $dua_Item->arabic_dua = $request->arabic_dua;
        $dua_Item->sanad_bn = $request->sanad_bn;
        $dua_Item->matan_bn = $request->matan_bn;
        $dua_Item->translation_bn = $request->translation_bn;
        $dua_Item->reference_bn = $request->reference_bn;
        $dua_Item->dua_item_row_html = $request->dua_item_row_html;
        $dua_Item->explanation = $request->explanation;
        $dua_Item->save();

        return back()->with('success', 'successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dua_Item $dua_Item, $id)
    {
        $dua_item =   Dua_Item::where('id', $id)->first();
        $dua_item->delete();
        return back()->with('success', 'Successfully Deleted!');
    }

    public function recycle_bin()
    {
        $delete_items = Dua_Item::onlyTrashed()->get();
        return view('recycle_bin.recycle_bin', compact('delete_items'));
    }
    public function dua_items_restore($id)
    {
        Dua_Item::onlyTrashed()->where('id', $id)->restore();
        return back();
    }

    public function dua_items_permanent_delete($id)
    {

        Dua_Item::onlyTrashed()->where('id', $id)->forceDelete();
        return back();
    }
}
