<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:sanctum')->except(['index','show']);
    }


    public function index()
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        return $product;
    }

    
    public function show(Product $product)
    {
        $product = new ProductResource($product);
        return $product;
    }

    
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
    }

    
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
