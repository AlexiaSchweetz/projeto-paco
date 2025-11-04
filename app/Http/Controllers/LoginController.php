<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $tokenRequest = Request::create('/oauth/token', 'POST', [
            'grant_type' => 'password',
            'client_id' => config('passport.client_id'),
            'client_secret' => config('passport.client_secret'),
            'username' => $credentials['email'],
            'password' => $credentials['password'],
            'scope' => '',
        ]);

        $response = app()->handle($tokenRequest);

        if ($response->getStatusCode() === 200) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
            }
            return $response->getContent();
        }

        return response()->json(['error' => 'Credenciais inválidas.'], 401);
    } 


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = new User;
        $user->name = mb_strtoupper($request->name);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'User created successfully'], 200);
    }
}
