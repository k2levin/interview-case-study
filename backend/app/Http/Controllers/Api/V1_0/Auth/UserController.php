<?php

namespace App\Http\Controllers\Api\V1_0\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Success'], 200);
    }

    // WIP
    public function verify(Request $request)
    {
        dd($request->all());
    }

    public function getProfile()
    {
        $user = auth()->user();

        $datas = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        return response()->json($datas, 200);
    }
}
