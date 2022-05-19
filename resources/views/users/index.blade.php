@extends('layouts.app')

@section('title', 'Usuarios')

@section('contents')

    <div class="container mt-3 mb-5">
        <h3 class="text-center">Lista de usuarios</h3>
        <br>
        <center>
            <a href="{{ route('userList.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Añadir...</a>
            <br>
            <br>
            <div>
                <div class="mr-5 ml-5">
                    <div class="">
                        <form action="{{ route('userList.search') }}" method="GET" role="search">

                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Buscar por nombre..." id="term" size="6">
                                <span class="input-group-btn mr-5 mt-1">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="text-center" style="line-height: 250px">
        </center>
    </div>

    <center>
    <div class="row">
        @foreach ($userobj as $user)
        <div class="col ml-2 mr-2 mb-2">

            <div class="alert alert-success" role="alert" style="width: 450px">
                <b>Nombres y apellidos:</b> {{$user->name}} {{$user->sndname}}
                <hr>
                <b>Correo:</b> {{$user->email}}
                <hr>
                <b>Rol:</b> {{$user->role}}
                <hr>
                <b>Usuario creado en:</b> {{$user->created_at}}
                <hr>
                <a href="/userList/{{$user->id}}/edit" class="btn btn-dark"><i class="fa fa-pencil"></i> Editar</a>
                <form class="form-group" action="userList/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-1">
                        <i class="fa fa-trash"></i> Borrar
                    </button>
                </form>
              </div>

        </div>
        @endforeach
    </div>

@endsection
