<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getStatus()
    {
        return response()->json(['status' => 'Available'], 200);
    }
}
