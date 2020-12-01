<?php

namespace App\Http\Controllers\Api\V1_0\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\UserCart;
use DB;

class OrderController extends Controller
{
    public function getMyOrders()
    {
        $user = auth()->user();

        $orders = Order::with(['products'])->where('user_id', $user->id)->get();

        $datas = [
            'order' => $orders,
        ];

        return response()->json($datas, 200);
    }

    public function createOrder()
    {
        $user = auth()->user();

        $carts = UserCart::where('user_id', $user->id)->get();

        // db rollback if error
        DB::transaction(function () use ($user, $carts) {
            $order_total_amount = 0;
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => 0,
                'status' => Order::STATUS_UNPAID,
            ]);
            foreach ($carts as $cart) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->product->price,
                ]);
                $order_total_amount += $cart->product->price;
            }
            $order->update(['total_amount' => $order_total_amount]);

            // clear user cart items
            UserCart::where('user_id', $user->id)->delete();
        });

        return response()->json(['message' => 'Success'], 200);
    }

    public function pay($id)
    {
        $user = auth()->user();

        Order::where('user_id', $user->id)->where('id', $id)->update(['status' => Order::STATUS_PAID_SUCCESSFUL]);

        return response()->json(['message' => 'Success'], 200);
    }
}
