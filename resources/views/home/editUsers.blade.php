@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="content">
            <div class="title">Käyttäjät</div>
            <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td><h4>Nimi</h4></td>
                            <td><h4>Sähköposti</h4></td>
                            @role('admin')<td><h4>Admin</h4></td>@endrole
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                                <form method="POST" action="/edit-users/{{ $user->id }}">
                                    {!! csrf_field() !!}
                                    {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
                                        </td>
                                        <td>
                                            <p>{{ $user->email }}</p>
                                        </td>

                                            <td>
                                                <input type="hidden" name="role"  value="2" />
                                            @role('admin')
                                                @if($user->is('admin'))
                                                    <input type="checkbox" name="role" value="1" checked>
                                                @else
                                                    <input type="checkbox" name="role" value="1">
                                                @endif
                                            </td>
                                        @endrole
                                        <td>
                                            <button type="submit" class="btn-primary"><i class="fa fa-floppy-o"></i> Päivitä tiedot</button>
                                        </td>
                                        <td>
                                            <a href="/edit-users/{{ $user->id }}/delete"><i class="fa fa-trash fa-lg"></i></a>
                                        </td>
                                    </tr>

                            </div>
                        </form>
                            @endforeach
                        </tbody>
                    </table>



            </div>

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