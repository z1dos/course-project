<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'login' => 'required|string|unique:users,login',
            'surname' => 'required|string',
            'name' => 'required|string',
            'patronymic' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'telephon_number' => 'required|string',
        ]);

        $user = User::create([
            'login' => $fields['login'],
            'surname' => $fields['surname'],
            'name' => $fields['name'],
            'patronymic' => $fields['patronymic'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'telephon_number' => $fields['telephon_number'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return $response;
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('login', $fields['login'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(
                ['message' => 'bad'], 401
            );
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return $response;
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'U logged out'
        ];
    }
}
