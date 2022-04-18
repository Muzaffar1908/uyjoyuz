<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flat_type;

class Flat_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flat_types = Flat_type::all();
        return view('admin.flat_type.index', compact('flat_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Flat_type::create($data);
        return redirect()->route('admin.flat_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flat_type = Flat_type::findorfail($id);
        return view('admin.flat_type.show', [
            'flat_type' => $flat_type,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flat_type = Flat_type::findorfail($id);
        return view('admin.flat_type.edit', [
            'flat_type' => $flat_type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat_type $flat_type)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $flat_type->update($data);
        return  redirect()->route('admin.flat_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat_type $flat_type)
    {
        $flat_type->delete();
        return  redirect()->route('admin.flat_type.index');
    }
}
