<?php

namespace App\Http\Controllers;

use App\Models\Around;
use App\Models\Around_table;
use App\Models\Comfort;
use App\Models\Comfort_table;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Flat_type;
use App\Models\Payment_type;
use App\Models\Region;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $flats = Flat::all();

        $bilish = User::find(Session::get('user'));
        
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }



        $flats = DB::table('flats')
        ->join('regions', 'flats.region', '=', 'regions.id')
        ->join('districts', 'flats.district', '=', 'districts.id')
        ->where('flats.user', '=', $bilish->id)
        ->select('flats.id', 'flats.name', 'flats.url')
        ->get();


        


        return view('user.my_ads.index')->with(['flats'=>$flats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flat_types = Flat_type::all();
        $regions = Region::all();
        $districts = District::all();
        $payment_types = Payment_type::all();
        return  view('user.my_ads.create')->with(['flat_types'=>$flat_types, 'regions'=>$regions, 'districts'=>$districts, 'payment_types'=>$payment_types]);
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
            'region' => 'required',
            'district' => 'required',
            'payment_type' => 'required',
            'flat_floor' => 'required',
            'floor' => 'required',
            'square' => 'required',
            'comment' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'price' => 'required',
            'number_of_rooms' => 'required',
            'user' => 'required',
            'url' => 'required',
            'rent_and_sale' => 'required',
        ]);

        


        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/')->with('error', 'Siz avval avtorizatsiyadan oting');
        }

        $file = $request->file('url')->store('photos');
            $data['url'] = $file;
        $flat = Flat::create($data);

        if($request->flat_type==1)
        {
            $flat = new flat;
            $flat -> user = $bilish->id;
            $flat ->name = $request -> name;
            $flat -> flat_type = $request -> flat_type;
            $flat -> rent_and_sale = $request -> rent_and_sale;
            $flat -> region = $request ->region;
            $flat ->district = $request->district;
            $flat -> comment = $request->comment;
            $flat -> flat_floor = $request->flat_floor;
            $flat -> square = $request -> square;
            $flat -> phone = $request ->phone;
            $flat -> payment_type = $request -> payment_type;
            $flat -> floor = $request -> floor;
            $flat -> number_of_rooms = $request ->number_of_rooms;
            $flat -> price = $request -> price;
            $flat -> url = $file;
            $flat ->save();
        }

        elseif($request->flat_type==2)
        {
            $flat = new flat;
            $flat -> user = $bilish->id;
            $flat ->name = $request -> name;
            $flat -> flat_type = $request -> flat_type;
            $flat -> rent_and_sale = $request -> rent_and_sale;
            $flat -> region = $request ->region;
            $flat ->district = $request->district;
            $flat -> comment = $request->comment;
            $flat -> flat_floor = $request->flat_floor;
            $flat -> square = $request -> square;
            $flat -> phone = $request ->phone;
            $flat -> payment_type = $request -> payment_type;
            $flat -> floor = $request -> floor;
            $flat -> number_of_rooms = $request ->number_of_rooms;
            $flat -> price = $request -> price;
            $flat -> url = $file;
            $flat ->save();
        }

        elseif($request->flat_type==3)
        {
            $flat = new flat;
            $flat -> user = $bilish->id;
            $flat ->name = $request -> name;
            $flat -> flat_type = $request -> flat_type;
            $flat -> rent_and_sale = $request -> rent_and_sale;
            $flat -> region = $request ->region;
            $flat ->district = $request->district;
            $flat -> comment = $request->comment;
            $flat -> flat_floor = $request->flat_floor;
            $flat -> square = $request -> square;
            $flat -> phone = $request ->phone;
            $flat -> payment_type = $request -> payment_type;
            $flat -> floor = $request -> floor;
            $flat -> number_of_rooms = $request ->number_of_rooms;
            $flat -> price = $request -> price;
            $flat -> url = $file;
            $flat ->save();
        }

        elseif($request->flat_type==4)
        {
            $flat = new flat;
            $flat -> user = $bilish->id;
            $flat ->name = $request -> name;
            $flat -> flat_type = $request -> flat_type;
            $flat -> rent_and_sale = $request -> rent_and_sale;
            $flat -> region = $request ->region;
            $flat ->district = $request->district;
            $flat -> comment = $request->comment;
            $flat -> flat_floor = $request->flat_floor;
            $flat -> square = $request -> square;
            $flat -> phone = $request ->phone;
            $flat -> payment_type = $request -> payment_type;
            $flat -> floor = $request -> floor;
            $flat -> number_of_rooms = $request ->number_of_rooms;
            $flat -> price = $request -> price;
            $flat -> url = $file;
            $flat ->save();
        }

        elseif($request->flat_type==5)
        {
            $flat = new flat;
            $flat -> user = $bilish->id;
            $flat ->name = $request -> name;
            $flat -> flat_type = $request -> flat_type;
            $flat -> rent_and_sale = $request -> rent_and_sale;
            $flat -> region = $request ->region;
            $flat ->district = $request->district;
            $flat -> comment = $request->comment;
            $flat -> flat_floor = $request->flat_floor;
            $flat -> square = $request -> square;
            $flat -> phone = $request ->phone;
            $flat -> payment_type = $request -> payment_type;
            $flat -> floor = $request -> floor;
            $flat -> number_of_rooms = $request ->number_of_rooms;
            $flat -> price = $request -> price;
            $flat -> url = $file;
            $flat ->save();
        }



        $arounds = array();
        $comforts = array();
        $j = 0;
        for($i=0;$i<$request->maxsoni1;$i++)
        {  
            $around='around'.$i;
            if(isset($request->$around))
            {
                $arounds[$j] = $request->$around;
                $j++;
            }
            
        
        }

        $j = 0;
        for($i=0;$i<$request->maxsoni2;$i++)
        {  
            $comfort='comfort'.$i;
            if(isset($request->$comfort))
            {
                $comforts[$i] = $request->$comfort;
                $j++;
            }
            
        
        }


        $n = sizeof($arounds);
        for($i=0;$i<$n;$i++)
        {
            $around = new Around_table;
            $around->around = $arounds[$i];
            $around->flat = $flat->id;
            $around->status = "0";
            $around->save();
        }

        $n = sizeof($comforts);
        for($i=0;$i<$n;$i++)
        {
            $comfort = new Comfort_table;
            $comfort->comfort = $comforts[$i];
            $comfort->flat = $flat->id;
            $comfort->status = "0";
            $comfort->save();
        }

        for($i = 1; $i <= 10; $i++)
        {
            $img = "img".$i;

            if($request->hasFile($img))
            {
                $file = $request->file($img)->store('photos');
                $img = new Photo;
                $img->flat = $flat->id;
                $img->url = $file;
                $img->save();
            }
        }

        return redirect()->route('user.my_ads.index');
    }

    public function my_ads()
    {
        $bilish = User::find(Session::get('user'));
        
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }


        $flats = DB::table('flats')
        ->join('regions', 'flats.region', '=', 'regions.id')
        ->join('districts', 'flats.district', '=', 'districts.id')
        ->where('flats.user', '=', $bilish->id)
        ->select('flats.id', 'flats.name', 'flats.url')
        ->get();

        
                
        return view('user.my_ads.show')->with(['flats'=>$flats]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flat = Flat::findorfail($id);
        return view('user.my_ads.show', [
            'flat' => $flat,
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
        $flat = Flat::find($id);
        $regions = Region::all(); 
        $districts = District::where('region_id', '=', $flat->region)->get();
        $flat_types = Flat_type::all();
        $payment_types = Payment_type::all();
        $comforts = DB::table('comfort_tables')
        ->join('flats', 'comfort_tables.flat', '=', 'flats.id')
        ->join('comforts', 'comfort_tables.comfort', '=', 'comforts.id')
        ->where('comfort_tables.flat', '=', $flat->id)
        ->select('comforts.name', 'comforts.id')->get();

        $all_comforts = Comfort::where('flat_type', '=', $flat->flat_type)->get();

        $arounds = DB::table('around_tables')
        ->join('flats', 'around_tables.flat', '=', 'flats.id')
        ->join('arounds', 'around_tables.around', '=', 'arounds.id')
        ->where('around_tables.flat', '=', $flat->id)
        ->select('arounds.name', 'arounds.id')->get();

        $all_arounds = Around::where('flat_type', '=', $flat->flat_type)->get();

        return view('user.my_ads.edit', [
            'flat' => $flat,
            'regions' => $regions,
            'districts' => $districts,
            'flat_types' => $flat_types,
            'comforts' => $comforts,
            'all_comforts' => $all_comforts,
            'arounds' => $arounds,
            'payment_types' => $payment_types,
            'all_arounds' => $all_arounds, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
        $data = $request->validate([
            'flat_type' => 'required',
            'region' => 'required',
            'district' => 'required',
            'payment_type' => 'required',
            'flat_floor' => 'required',
            'floor' => 'required',
            'square' => 'required',
            'comment' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'price' => 'required',
            'number_of_rooms' => 'required',
        ]);

        $flat->update($data);
        return redirect()->route('user.my_ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $flat = Flat::find($id);
        // $flat->delete();
        // return redirect()->route('user.my_ads.index');
    }

    public function getdistrict(Request $req)
    {
        $districts=District::where('region_id','=',$req->id)->get();
                            
        return response()->json($districts);
    }


    public function getaround(Request $req)
    {
        $arounds=Around::where('flat_type','=',$req->id)->get();
    
        return response()->json($arounds);
        
    }

    public function getcomfort(Request $req)
    {
        $comfort=Comfort::where('flat_type','=',$req->id)->get();
                
        return response()->json($comfort);
    }
}
