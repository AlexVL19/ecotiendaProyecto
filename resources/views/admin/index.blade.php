@extends('layouts.app')

@section('title', 'Administrador')

@section('contents')

<center>
    <div class="container-fluid mt-5 mb-3 rounded" id="fondo2">
        <div id="titulo">
            <h2><i>¡Ahora estás en modo administrador!</i></h2>
            <br>
            <h5>¡Bienvenid@! Aquí podrás gestionar aspectos importantes del sistema.</h5>
        </div>
    </div>

    <div class="container-fluid mt-2 mb-3">
        <h2><i>Sobre el administrador</i></h2>
        <hr style="width: 250px">
        <br>
        <p>
            El administrador es considerado un permiso especial, y permite gestionar aspectos importantes como
            <br>
            los usuarios registrados en el sistema y los productos incluidos en el módulo de compras.
            <br>
        </p>
        <br>
    </div>
</center>

@endsection
