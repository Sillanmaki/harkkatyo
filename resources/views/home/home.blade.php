@extends('layouts.layout')

@section('content')
<div class="container">
    @role('admin')
        <h2><a href="/edit-users">Muokkaa käyttäjiä</a></h2>
        <h2><a href="/orders">Kaikki tilaukset</a></h2>
    @else
        <h2><a href="/edit-users">Muokkaa tietojasi</a></h2>
        <h2><a href="/orders">Omat tilauksesi</a></h2>
    @endrole
</div>
@endsection
