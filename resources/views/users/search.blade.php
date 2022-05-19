@extends('layouts.app')

@section('title', 'Búsqueda')

@section('contents')

    <div class="container mt-3 mb-5">
        <h3 class="text-center">Resultados de búsqueda</h3>
        <br>
        <center>
            <a href="{{ route('userList.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Añadir...</a>
            <br>
            <br>
            <div>
                <div class="ml-5 mr-5">
                    <div class="">
                        <form action="{{ route('userList.search') }}" method="GET" role="search">

                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Buscar por nombre..." id="term" size="5">
                                <span class="input-group-btn mr-2 mt-1">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                </span>
                                <span class="input-group-btn mt-1">
                                    <a href="{{ route('userList.index')}}" class="btn btn-dark">
                                        <i class="fa fa-remove"></i> Cancelar
                                    </a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="text-center" style="line-height: 200px">
        </center>
    </div>

    <center>
    <div class="row">
        @foreach ($usersearch as $user)
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
                <br>
                <form class="form-group" action="userList/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Borrar
                    </button>
                </form>
              </div>

        </div>
        @endforeach
    </div>

@endsection
