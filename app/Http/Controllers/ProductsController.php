<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;

class ProductsController extends Controller
{
    public function indexProducts()
    {
        $products = Products::all();

        return response()->json($products);
    }

    public function createProducts()
    {
        return view('products.index');
    }

    public function storeProducts(StoreProductsRequest $request)
    {
        $products = new Products();

        $products->name = $request->post('name');
        $products->description = $request->post('description');
        $products->price = $request->post('price');
        $products->brand_id = $request->post('brand_id');

        $products->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function showProducts(Products $products, $id)
    {
        $products = Products::findOrFail($id);

        return view('products.show', compact('products'));
    }

    public function editProducts(Products $products, $id)
    {
        $products = Products::findOrFail($id);

        return view('sales.edit', ['products' => $products]);
    }

    public function updateProducts(UpdateProductsRequest $request, Products $products, $id)
    {
        $products = Products::findOrFail($id);
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->brand_id = $request->input('brand_id');

        $products->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroyProducts(Products $products, $id)
    {
        $products = Products::find($id);

        if (!$products) {
            return redirect()->route('products.index')->withErrors('This product does not exist');
        }

        $products->delete();
        return redirect()->route('products.index')->with('success', 'Product eliminated correctly');
    }
}
