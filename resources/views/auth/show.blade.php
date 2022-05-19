@extends('layouts.app')

@section('title', 'Detalles del usuario')

@section('contents')
    <div class="container mt-3 mb-5">
        <h3 class="text-center">Información del usuario</h3>

        <center>
        <div class="container">
            <div class="col mt-5 mb-5 text-center">
                <div class="alert alert-success" role="alert" style="width: 450px">
                    <hr>
                    <b>Nombres:</b> {{auth()->user()->name}}
                    <hr>
                    <b>Apellidos:</b> {{auth()->user()->sndname}}
                    <hr>
                    <b>Correo:</b> {{auth()->user()->email}}
                    <hr>
                    <b>Rol:</b> {{auth()->user()->role}}
                    <hr>
                </div>
            </div>
            <a href="{{route('login.edit')}}" class="btn btn-dark"><i class="fa fa-pencil"></i> Editar usuario</a>
        </div>

        </center>
    </div>
@endsection
