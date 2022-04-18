<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function  check(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('login', '=', $request->login)->first();

        if(Hash::check($request->password, $user->password))
        {
            if(empty($user))
            {
                return  redirect()->back()->with('xabar', 'Login yoki parol xato');
            }

            if($user->status == '1')
            {
                Session::put('admin', $user->id);
                return redirect('admin');
            }
            else if($user->status == '2')
            {
                Session::put('user', $user->id);
                return redirect('user');
            }
        }
    }

    public function  adduser(Request $add)
    {
        $add->validate([
            'password' => 'required',
            'pass' => 'required',
            'login' => 'required',
            'phone' => 'required',
        ]);

        $check = User::where('login', '=', $add->login)->first();
        // $check2 = User::where('email', '=', $add->email)->first();

        if(!empty($check2))
        {
            return  redirect()->back()->with('error', "Email avval ishlatilagan");
        }

        if(empty($check))
        {
            if($add->password === $add->pass)
            {
                $user = new User;
                $user->status = '2';
                $user->login = $add->login;
                $user->password = Hash::make($add->password);
                $user->phone = $add->phone;
                $user->save();

            }
            else
            {
                return  redirect()->back()->with('error', 'Parollar bir xil emas');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Login avval ishlatilgan');
        }

        if($user)
        {
            return redirect('/login')->with('xabar', 'OK! OK! OK!');
        }
        else
        {
            return redirect('/')->back()->with('error', 'Xatolik yuz berdi! Registratsiya oynasidan boshqatdan o`ting');
        }

    }

    public function getlogindata(Request $request)
    {
        $login = User::where('login', '=', $request->login)->first();

        if(empty($login))
        {
            $data = "Login band qilinmagan";
        }
        else
        {
            $data = "Loginni o`zgartiring";
        }

        return response()->json($data);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    public  function  update(Request $request, User $user)
    {
        $data = $request->validate([
            'login' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $user->update($data);
        return  redirect()->route('admin.user.index');

        
    }

    
}
