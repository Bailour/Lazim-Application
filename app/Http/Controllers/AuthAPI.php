<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthAPI extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Password::default()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message'=>'User Created'], 201);
    }

    public function login(Request $request){

        $request->validate([
            'email' =>'required|string|email|max:255',
            'password' => ['required', Password::default()],
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            // Optionally, generate a token for the user
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['AccessToken' => $token], 200);
        }

        // Authentication failed
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    function destroy(){
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(['message'=>'Logged Out'], 200);
    }
}
