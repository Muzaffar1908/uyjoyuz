<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CheckController extends Controller
{
    public function  admin($id)
    {
        $user = User::find($id);

        if(empty($user))
        {
            return '0';
        }

        if($user->status == '1')
        {
            return  '1';
        }
        else
        {
            return '0';
        }

    }

  

    public  function  out()
    {
        session()->forget('admin');

        session()->forget('user');

        return  redirect('/');
    }
}
