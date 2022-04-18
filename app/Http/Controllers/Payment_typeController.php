<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_type;

class Payment_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_types = Payment_type::all();
        return view('admin.payment_type.index', compact('payment_types'));
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
            'sum' => 'required',
        ]);

        Payment_type::create($data);
        return redirect()->route('admin.payment_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment_type = Payment_type::findorfail($id);
        return view('admin.payment_type.show', [
            'payment_type' => $payment_type,
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
        $payment_type = Payment_type::findorfail($id);
        return view('admin.payment_type.edit', [
            'payment_type' => $payment_type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment_type $payment_type)
    {
        $data = $request->validate([
            'name' => 'required',
            'sum' => 'required',
        ]);

        $payment_type->update($data);
        return  redirect()->route('admin.payment_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Payment_type $payment_type)
    {
        $payment_type->delete();
        return redirect()->route('admin.payment_type.index'); 
    }
}
