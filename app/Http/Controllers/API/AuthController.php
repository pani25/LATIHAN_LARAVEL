<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|unique:user',
            'password' => 'required|string|max:50',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['name']),
        ]);
        $token = $user->createToken('MyappToken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token,
            'type Token' => 'Bearer',
        ];
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email|unique:user',
            'password' => 'required|string|max:50',
        ]);
        // logika login jika benar
        $user = User::where('email', $fields['email'])->first();
        // logika password benar
        if (!$user || Hash::check($fields['password'], $user->password)) {
            return response()->json(
                [
                    'message' => 'Email atau Password tidak benar',
                ],
                Response::HTTP_NOT_FOUND
            );
        }
        $token = $user->createToken('MyappToken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token,
            'type Token' => 'Bearer',
        ];
        return response()->json($res, response());
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens->each(function ($token) {
                $token->delete();
            });
        return response()->json(
            [
                'message' => 'logout berhasil dilakukan',
            ],
            Response::HTTP_OK
        );
    }
}
