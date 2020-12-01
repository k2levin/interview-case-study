<?php

namespace App\Http\Controllers\Api\V1_0\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CartAddRequest;
use App\Models\Product;
use App\Models\UserCart;

class CartController extends Controller
{
    public function getMyCart()
    {
        $user = auth()->user();

        $carts = UserCart::with(['product'])->where('user_id', $user->id)->get();

        $datas = [
            'cart' => $carts,
        ];

        return response()->json($datas, 200);
    }

    public function addItem(CartAddRequest $request)
    {
        $user = auth()->user();

        $product = Product::find($request->product_id);

        UserCart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'price' => $product->price,
        ]);

        return response()->json(['message' => 'Success'], 200);
    }

    public function removeItem($id)
    {
        $user = auth()->user();

        UserCart::where('user_id', $user->id)->where('id', $id)->delete();

        return response()->json(['message' => 'Success'], 200);
    }

    public function clearAll()
    {
        $user = auth()->user();

        UserCart::where('user_id', $user->id)->delete();

        return response()->json(['message' => 'Success'], 200);
    }
}
