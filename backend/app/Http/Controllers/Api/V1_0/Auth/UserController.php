<?php

namespace App\Http\Controllers\Api\V1_0\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        dd($request->all());
    }

    public function verify(Request $request)
    {
        dd($request->all());
    }

    public function getProfile()
    {
        //
    }
}
