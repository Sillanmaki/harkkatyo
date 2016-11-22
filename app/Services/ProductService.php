<?php

namespace App\Services;

use App\Product;

use Illuminate\Http\Request;

class ProductService {

    public function addProduct(Request $request) {


        if ($request->hasFile('photo')) {

            $request->file('photo')->move(public_path(). "/uploads", $request->get('name') . '.' . $request->file('photo')->getClientOriginalExtension());
            $img_name = $request->get('name') . '.' . $request->file('photo')->getClientOriginalExtension();
            Product::create(array('name' => $request->get('name'), 'price' => $request->get('price'), 'price_type' => $request->get('price_type'), 'image_name' => $img_name));
        }

        else
            Product::create($request->all());

    }

    public function updateProduct(Request $request, Product $product)
    {
        if ($request->hasFile('photo')) {

            $request->file('photo')->move(public_path(). "/uploads", $request->get('name') . '.' . $request->file('photo')->getClientOriginalExtension());
            $img_name = $request->get('name') . '.' . $request->file('photo')->getClientOriginalExtension();
            $product->update(array('name' => $request->get('name'), 'price' => $request->get('price'), 'price_type' => $request->get('price_type'), 'image_name' => $img_name));
        }
        else
            $product->update($request->all());
    }

}