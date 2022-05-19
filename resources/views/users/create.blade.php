@extends('layouts.app')

@section('title', 'Creación de usuario')

@section('contents')

<div class="container border rounded mt-5" style="width: 600px; background-color: #edf7ef">
    <h3 class="text-center mt-4">Crear un usuario</h3>
    <br>
    <form method="POST" action="/userList">
        @csrf

        <div class="form-group">
          <label for="name">Nombre del usuario</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Escriba su nombre...">
        </div>
        <br>

        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
        <br>
        @enderror

        <div class="form-group">
            <label for="name">Apellidos del usuario</label>
            <input type="text" class="form-control" id="sndname" name="sndname" placeholder="Escriba sus apellidos...">
          </div>
          <br>

        @error('sndname')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        <br>
        @enderror

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Escriba su correo...">
          </div>
        <br>

        @error('email')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        <br>
        @enderror

          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Escriba su contraseña...">
        </div>
        <br>

        @error('password')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        <br>
        @enderror

        <center>
        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Añadir</button>
        <a href="{{route('userList.index')}}" class="btn btn-dark"><i class="fa fa-reply"></i> Volver</a>
        <br>
        <br>
      </form>
</div>

@endsection
