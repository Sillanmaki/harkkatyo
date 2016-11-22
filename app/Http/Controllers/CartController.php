<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;

use Auth;
use Cart;
use App\Product;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {

        $cart = Cart::content();

        return view('pages.cart', compact('cart'));

    }

    public function addCart(Request $request)
    {
        $product_id = $request->get('product_id');
        $product = Product::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));


        return json_encode(['lel' => $product_id]);
    }

    public function increase($item_id)
    {
        $rowId = Cart::search(array('id' => $item_id));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty + 1);

        return redirect('/cart');
    }

    public function decrease($item_id)
    {

        $rowId = Cart::search(array('id' => $item_id));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 1);

        return redirect('/cart');
    }

    public function delete($item_id)
    {
        $rowId = Cart::search(array('id' => $item_id));
        Cart::remove($rowId[0]);

        return redirect('/cart');
    }

    public function clear()
    {
        Cart::destroy();

        return redirect('/cart');
    }

    public function checkout()
    {

        if(count(Cart::content())){

            $order = Order::create(array('user_id' => Auth::id(), 'total' => Cart::total()));

            foreach (Cart::content() as $item) {
                OrderProduct::create(array('order_id' => $order->id, 'product_id' => $item->id, 'name' => $item->name, 'qty' => $item->qty, 'price' => $item->subtotal ));
            }

            Cart::destroy();

            Session::flash('thanks', '1');
        }

        return redirect('/cart');
    }

}
