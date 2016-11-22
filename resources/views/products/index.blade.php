@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="content">
            <div class="title">Tuotteet</div>
            <div>

                @foreach($products as $product)

                    <div>
                        <h2><a href="/products/{{ $product->id }}">{{ $product->name }}</a></h2>
                    </div>

                @endforeach

            </div>

            <hr>

            @role('admin')
                <h3>Lisää uusi tuote</h3>

            <form method="POST" action="{{ url('/products') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}


                <table class="table">
                    <thead>
                    <tr>
                        <td><h4>Nimi</h4></td>
                        <td><h4>Hinta</h4></td>
                        <td>Hinnan tyyppi</td>
                        <td>Kuva</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                            <div class="form-group">
                                <tr>
                                    <td>
                                        <input class="form-control" id="name" name="name" value="{{old('name')}}" required>
                                    </td>
                                    <td>
                                        <input class="form-control" id="price" type="number" name="price" value="{{old('price')}}" required>
                                    </td>
                                    <td>
                                        <label><input class="form-control" id="price_type1" type="radio" value="€/kg" name="price_type" required> €/kg</label>

                                        <label><input class="form-control" id="price_type2" type="radio" value="€/kpl" name="price_type"> €/kpl</label>

                                    </td>
                                    <td>
                                        <input type="file" name="photo" />
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Lisää tuote</button>
                                    </td>
                                </tr>
                            </div>
                    </tbody>
                </table>
            </form>

            @endrole






            <!-- Virheilmoitusten näyttäminen -->
            @if(count($errors))
                <ul>

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            @endif

        </div>
    </div>

@stop