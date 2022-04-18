<?php

namespace App\Http\Controllers;

use App\Models\Around;
use App\Models\Flat_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arounds = Around::all();
        $flat_types = Flat_type::all();

        $arounds = DB::table('arounds')
        ->join('flat_types', 'arounds.flat_type',  '=', 'flat_types.id')
        ->select('flat_types.name', 'arounds.name as aroundname', 'flat_types.id')
        ->orderby('arounds.flat_type')->get();

        return view('admin.around.index', compact('arounds', 'flat_types'));
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
            'flat_type' => 'required',
        ]);

        Around::create($data);
        return redirect()->route('admin.around.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $around = Around::findorfail($id);
        return view('admin.around.show', [
            'around' => $around,
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
        $around = Around::findorfail($id);
        $flat_types = Flat_type::all();
        return view('admin.around.edit', [
            'around' => $around,
            'flat_types' => $flat_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Around $around)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $around->update($data);
        return redirect()->route('admin.around.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Around $around)
    {
        $around->delete();
        return redirect()->route('admin.around.index');
    }
}
