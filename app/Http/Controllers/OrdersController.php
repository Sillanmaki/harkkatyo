<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if (Auth::user()->isAdmin())
            $orders = Order::all();
        else
            $orders = Order::where('user_id', Auth::id())->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {

        return view('orders.show', compact('order'));

    }
}
