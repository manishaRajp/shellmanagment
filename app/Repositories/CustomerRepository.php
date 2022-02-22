<?php

namespace App\Repositories;

use App\Contracts\CustomerContract;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerRepository implements CustomerContract
{
    public function Register(array $request)
    {
        $input = $request;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->token = $user->createToken('ThisApplication')->accessToken;
        return $user;
    }

    public function Login(array $request)
    {
        $user = User::where('email', $request['email'])->first();
        $arr = [];
        if ($user) {
            if (!Hash::check($request['password'], $user['password'])) {
                $arr = array("message" => "Password not match.", "status" =>  422);
            } else {
                $user->token = $user->createToken('ThisApplication')->accessToken;
                $arr = [
                    "message" => "Login successfully",
                    "status" => 200,
                    "data" => $user,
                ];
            }
        } else {
            $arr = [
                "message" => "The Email in Not in Record",
                "status" =>  401,
                "data" => null,
            ];
        }
        return $arr;
    }
   
}
