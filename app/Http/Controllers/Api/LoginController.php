<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\DB;    


class LoginController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'text1' => 'required',
            'text2' => 'required',
        ]);
         
        $user = User::where('login', '=', $request->login)->first();

        if(empty($user))
        {
            return  "Salom";
        }

        if(Hash::check($request->password, $user->password))
        {
            $token = $user->createToken('client')->accessToken;
            $token1 = DB::table('personal_access_tokens')
            ->where('personal_access_tokens.id', '=', $token->id)
            ->first();

            return response()->json(['token' => $token1->token]);
        }


    }

    public function login(Request $request)
    {
        $token = $request->bearerToken();
        echo $token;

    }
}
