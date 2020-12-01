<?php

namespace App\Http\Controllers\Api\V1_0\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function login(Request $request)
    {
        dd($request->all());
    }

    public function register(Request $request)
    {
        dd($request->all());
    }
}
