<?php

namespace App\Http\Controllers\Api\V1_0\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        dd($request->all());
    }

    public function remove(Request $request)
    {
        dd($request->all());
    }

    public function clear(Request $request)
    {
        dd($request->all());
    }
}
