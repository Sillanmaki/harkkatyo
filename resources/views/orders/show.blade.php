@extends('layouts.layout')

@section('content')

    <h1>{{ $order->id }}</h1>


            <table class="table table-striped">
                <thead>
                <tr class="cart_menu">
                    <td class="">Tuote</td>
                    <td class="">Määrä</td>
                    <td class="">Hinta</td>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderProducts as $orderProduct)
                    <tr>
                        <td>
                            <h4>{{$orderProduct->name}}</h4>
                        </td>

                        <td>
                                <h4>{{ $orderProduct->qty }} </h4>
                        </td>
                        <td>
                            <h4>{{$orderProduct->price}}€</h4>
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>

    <h2>Yhteensä {{ $order->total }}€</h2>

@stop