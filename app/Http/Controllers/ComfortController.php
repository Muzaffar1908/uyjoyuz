<?php

namespace App\Http\Controllers;

use App\Models\Comfort;
use Illuminate\Http\Request;

use App\Models\Flat_type;
use Illuminate\Support\Facades\DB;

class ComfortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comforts = Comfort::all();
        $flat_types = Flat_type::all();

        $comforts = DB::table('comforts')
        ->join('flat_types', 'comforts.flat_type',  '=', 'flat_types.id')
        ->select('flat_types.name', 'comforts.name as comfortname', 'flat_types.id')
        ->orderby('comforts.flat_type')->get();


        return view('admin.comfort.index', compact('comforts', 'flat_types'));

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
            'flat_type' => 'required',
            'name' => 'required',
        ]);

        Comfort::create($data);
        return redirect()->route('admin.comfort.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comfort = Comfort::findorfail($id);
        return view('admin.comfort.show', [
            'comfort' => $comfort,
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
        $comforts = Comfort::findorfail($id);
        $flat_types = Flat_type::all();
        return view('admin.comfort.index', [
            'comforts' => $comforts,
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
    public function update(Request $request, Comfort $comfort)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $comfort->update($data);
        return redirect()->route('admin.comfort.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comfort $comfort)
    {
        $comfort->delete();
        return redirect()->route('admin.comfort.index');
    }
}
