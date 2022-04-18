<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Flat;
use App\Models\Flat_type;
use App\Models\Region;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function flat_type()
    {
        $flat_types = Flat_type::all();

        return view('welcome')->with(['flat_types'=>$flat_types]);

    }

    public function index($id, Request $request)
    {
        $flats = Flat::where('flat_type', '=', $id)->get();

            $regions = Region::all();
            $districts = District::all();
            $flat_types = Flat_type::all();
        
        if($id == 1)
        {
            return view('filter.first')->with(['flats'=>$flats])->with(['regions'=>$regions])->with(['districts'=>$districts])->with(['flat_types'=>$flat_types]);
        }
    }
}
