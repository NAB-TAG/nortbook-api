<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AuthService
{
    public function register( array $data )
    {
        $user = new User();
        $user->name = $data[ "name" ];
        $user->email = $data[ "email" ];
        $user->password = Hash::make($data[ "password" ]);

        if ( $user->save() ) {
            return response()->json(["success", "Successful operation", "The user has registered successfully."], 201);
        } else {
            return response()->json(["error", "Failed operation", "The user has can not registered for a problem the server, cominicate have the admin."], 500);
        }
    }
}