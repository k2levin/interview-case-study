<?php

namespace App\Http\Controllers\Api\V1_0\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getBrand()
    {
        $brands = Brand::all();

        $datas = [
            'brand' => $brands,
        ];

        return response()->json($datas, 200);
    }

    public function getCategory()
    {
        $categories = Category::all();

        $datas = [
            'category' => $categories,
        ];

        return response()->json($datas, 200);
    }

    public function getProduct(Request $request)
    {
        $product_query = Product::with(['brand', 'category'])->where('status', Product::STATUS_ENABLE);

        if ($request->has('brand')) {
            $product_query = $product_query->whereHas('brand', function (Builder $query) use ($request) {
                $query->where('name', $request->brand);
            });
        }

        if ($request->has('category')) {
            $product_query = $product_query->whereHas('category', function (Builder $query) use ($request) {
                $query->where('name', $request->category);
            });
        }

        $datas = [
            'product' => $product_query->get(),
        ];

        return response()->json($datas, 200);
    }
}
