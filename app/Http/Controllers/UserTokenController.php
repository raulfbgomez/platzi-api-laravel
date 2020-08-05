<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserTokenController extends Controller
{
    public function __invoke(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'El email ingresado no se encontro'
            ]);
        }
        if (Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                'token' => $user->createToken($request->device_name)->plainTextToken
            ]);
        } else {
            throw ValidationException::withMessages([
                'email' => 'No se encontro ningun usuario'
            ]);
        }

    }
}
