<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
//        $products = new ProductCollection(
//            Product::query()
//                ->with('reviews')
//                ->orderByDesc('updated_at')
//                ->simplePaginate(2));


        $products = Product::query()
            ->with('reviews')
            ->orderByDesc('updated_at')
            ->simplePaginate(10);

        $productsCollection = ProductResource::collection($products)->response()->getData(true);

        $productsCollection['message'] = 'Products listing!';

        return response()->json($productsCollection);
    }

    public function details(Request $request, $prodId)
    {
        $product = Product::query()
            ->with(['categories', 'reviews'])
            ->where('id', '=', $prodId)
            ->first();

        return response()->success('Product details!', $product);
    }
}
