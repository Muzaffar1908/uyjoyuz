<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();
        $regions = Region::all();

        $districts = DB::table('districts')
        ->join('regions', 'districts.region_id',  '=', 'regions.id')
        ->select('regions.name', 'districts.name as districtname', 'regions.id')
        ->orderby('districts.region_id')->get();

        return view('admin.district.index', compact('districts', 'regions'));
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
            'region_id' => 'required',
            'name' => 'required',
        ]);

        District::create($data);
        return redirect()->route('admin.district.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $district = District::findorfail($id);
        return  view('admin.district.show', [
            'district' => $district,
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
        $district = District::findorfail($id);
        $regions = Region::all();
        return  view('admin.district.edit', [
            'district' => $district,
            'regions' => $regions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $distirct)
    {
        $data = $request->validate([
            'name' => 'required',
            'region_id' => 'required',
        ]);

        $distirct = District::find($request->id);
        $distirct->update($data);
        return  redirect()->route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distirct = District::find($id);
        $distirct->delete();
        return  redirect()->route('admin.district.index');
    }
}
