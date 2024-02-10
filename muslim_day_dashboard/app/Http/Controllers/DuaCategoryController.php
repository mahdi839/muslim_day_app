<?php

namespace App\Http\Controllers;

use App\Models\Dua_category;
use Illuminate\Http\Request;

class DuaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dua_category = Dua_category::all();
        return view('dua_category.index', compact('dua_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dua_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_bn' => 'required',
            'title_en' => 'nullable'
        ]);

        Dua_category::insert([
            'title_bn' => $request->title_bn,
            'title_en' => $request->title_en,
        ]);
        return back()->with('success', 'successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dua_category $dua_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dua_category $dua_category)
    {


        return view('dua_category.edit', compact('dua_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dua_category $dua_category)
    {
        $request->validate([
            'title_bn' => 'required',
            'title_en' => 'nullable'
        ]);

        $dua_category->title_bn = $request->title_bn;
        $dua_category->title_en = $request->title_en;
        $dua_category->save();
        return back()->with('success_update', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dua_category $dua_category)
    {

        $dua_category->delete();
        return back();
    }
}
