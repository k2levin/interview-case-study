<?php

namespace App\Http\Controllers\Api\V1_0\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GuestLoginRequest;
use App\Http\Requests\Auth\GuestRegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function login(GuestLoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $datas = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ];

        return response()->json($datas, 200);
    }

    public function register(GuestRegisterRequest $request)
    {
        $is_existing_user = User::where('email', $request->email)->exists();

        if ($is_existing_user) {
            return response()->json(['message' => 'Email already used'], 200);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Success'], 200);
    }
}
