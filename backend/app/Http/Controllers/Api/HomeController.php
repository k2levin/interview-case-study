<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a status for the server
     *
     * @return \Illuminate\Http\Response
     */
    public function getStatus()
    {
        return response()->json(['status' => 'Available'], 200);
    }
}
