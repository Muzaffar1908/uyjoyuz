<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CheckController;


class AdminController extends Controller
{
    public  function admin()
    {
        $check = new CheckController;
        $bilish = $check->admin(Session::get('admin'));
        
        if($bilish == '1')
        {
            return view('admin.index');
        }
        else
        {
            return redirect('/');
        }



    }

  

}
