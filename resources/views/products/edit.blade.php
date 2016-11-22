@extends('layouts.layout')

@section('content')



    <div class="container">
        <div class="content">
            <div class="title">Muokkaa tuotetta</div>

            <table class="table">
                <thead>
                <tr>
                    <td><h4>Nimi</h4></td>
                    <td><h4>Hinta</h4></td>
                    <td>Hinnan tyyppi</td>
                    <td>Kuva</td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>


                <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <tr>
                        <td>
                            <input class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </td>

                        <td>
                            <input class="form-control" id="price" type="number" name="price" value="{{ $product->price }}" required>
                        </td>

                        <td>
                            <input class="form-control" id="price_type1" type="radio" value="€/kg" name="price_type" required> €/kg
                            <input class="form-control" id="price_type2" type="radio" value="€/kpl" name="price_type"> €/kpl
                        </td>
                        <td>
                            <input type="file" name="photo" />
                        </td>
                        <td>
                            <button type="submit" class="btn-primary">Päivitä tuote</button>
                        </td>
                        <td>
                                <a href="/products/{{ $product->id }}/delete"><i class="fa fa-trash fa-lg"></i></a>
                        </td>



                    </tr>


                </div>
                </tbody>
            </table>

            </form>





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