<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $registerData = $request->all();
        $registerData['password'] = bcrypt($request->password);
        $user = User::create($registerData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return redirect()->route('login', ['user' => Auth::user()]);
//        return response()->json(['user' => $user, 'access_token' => $accessToken], 200);
    }

    public function login(LoginRequest $request)
    {
        $loginData = $request->only('email', 'password');

        if (!Auth::attempt($loginData)) {
            return redirect()->back()->withErrors(['message' => 'wrong username or password']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return redirect()->route('trangchu');
//        return response()->json(['user' => Auth::user(), 'access_token' => $accessToken], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
