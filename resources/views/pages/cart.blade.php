@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="content">
            <div class="title">Ostoskorisi:</div>
        </div>
    </div>

    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                @if(count($cart))
                    <table class="table table-striped">
                        <thead>
                        <tr class="cart_menu">
                            <td class="">Tuote</td>
                            <td class="">Hinta</td>
                            <td class="">Määrä</td>
                            <td class="">Yhteensä</td>
                            <td>Poista</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td class="cart_description">
                                    <h4><a href="">{{$item->name}}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <h4>{{$item->price}}€</h4>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <h4>
                                            <a class="cart_quantity_up" href="/cart/{{ $item->id }}/increase"> + </a>
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                            <a class="cart_quantity_down" href="/cart/{{ $item->id }}/decrease"> - </a>
                                        </h4>

                                    </div>
                                </td>
                                <td class="cart_total">
                                    <h4 class="cart_total_price">{{$item->subtotal}}€</h4>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="/cart/{{ $item->id }}/delete"><i class="fa fa-trash fa-2x"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        @else
                            <h3>Sinulla ei ole tuotteita ostoskorissa</h3>
                        @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    @if(count($cart))
        <section id="do_action">
            <div class="container">
                <div class="col-sm-6">
                    <div class="total_area">
                        <h1>Yhteensä {{Cart::total()}}€</h1>
                        <a class="btn btn-default update" href="{{url('clear-cart')}}">Tyhjennä kori</a>
                        <a class="btn btn-default check_out" href="{{url('checkout')}}">Tallenna tilaus</a>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
    @endif

    <div class="container">

        @if(Session::has('thanks'))
            <h1>Kiitos tilauksestasi</h1>
        @endif


    </div>

@stop