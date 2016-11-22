@extends('layouts.layout')

@section('content')

    @role('admin')
    <h1>Kaikki tilaukset</h1>
    @else
        <h1>Tilauksesi</h1>
    @endrole

    @if(count($orders))
        @foreach($orders as $order)

            <div>

                <a href="/orders/{{ $order->id }}">{{ $order->id }}</a>

            </div>

        @endforeach
        @else
            <p>Sinulla ei ole yhtään tilaust tehtynä</p>
        @endif



@stop