<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

use App\Services\ProductService;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['add', 'edit', 'update', 'delete']]);
    }

    public function index()
    {

        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function show(Product $product)
    {

        return view('products.show', compact('product'));
    }


    public function add(ProductService $productService, Request $request)
    {
        $this->validate($request, [

            'name' => 'required|min:2',
            'price' => 'required',
            'price_type' => 'required'

        ]);

        $productService->addProduct($request);


        return back();

    }


    public function edit(Product $product)
    {

        return view('products.edit', compact('product'));

    }

    public function update(ProductService $productService, Request $request, Product $product)
    {
        $this->validate($request, [

            'name' => 'required|min:2',
            'price' => 'required',
            'price_type' => 'required'

        ]);

        $productService->updateProduct($request, $product);

        return redirect('/products/'.$product->id);

    }

    public function delete(Product $product)
    {

        $product->delete();

        return redirect('/products/');

    }

}
