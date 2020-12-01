<?php

namespace App\Http\Controllers\Api\V1_0\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        dd($request->all());
    }

    public function pay(Request $request)
    {
        dd($request->all());
    }
}
