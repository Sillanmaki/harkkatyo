@extends('layouts.layout')

@section('content')

        <!-- For ajax calls -->
<meta name="_token" content="{!! csrf_token() !!}"/>

    <h1><a href="/products">Takaisin tuotteisiin</a></h1>

<h2 id="result"></h2>

<img src="/uploads/{{ $product->image_name }}" alt="{{ $product->name }}" style="max-width:400px;max-height:300px;">
    <h1>{{ $product->name }}</h1>
    <h1>{{ $product->price }} {{ $product->price_type }}</h1>

    @role('admin')
<form action="/products/{{ $product->id }}/edit"><button type="submit" class="btn btn-default">Muokkaa</button></form>@endrole

<hr>

    <div>
        <button type="" id="addButton" class="btn btn-default add-to-cart">
            <i class="fa fa-shopping-cart"></i>
            Lisää ostoskoriin
        </button>
    </div>


    <!-- the result of the search will be rendered inside this div -->

    <script>

                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                });


        $("#addButton").click(function(){
            $.post("/cart",
                    {
                        product_id: "{{$product->id}}"
                    }).done(function (data) {
                    console.log(data);
                    $("#result").text("Lisäys onnistui");
                }).fail(function (data) {
                console.log(data);
                $("#result").text("Lisäys epäonnistui");
            })
        });
    </script>

    <!-- Virheilmoitusten näyttäminen -->
    @if(count($errors))
        <ul>

            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>

    @endif

@stop