@extends('layouts.app')

@section('title', 'Creación de categoría')

@section('contents')

<div class="container border rounded mt-5" style="width: 600px; background-color: #edf7ef">
    <h3 class="text-center mt-4">Crear una categoría</h3>
    <br>
    <form method="POST" action="/categories">
        @csrf

        <div class="form-group">
          <label for="cat_name">Nombre de categoría</label>
          <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Escriba el nombre de categoría...">
        </div>
        <br>

        @error('cat_name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
        <br>
        @enderror

        <div class="form-group">
            <label for="name">Estado</label>
            <input type="number" class="form-control" id="status" name="status" placeholder="Especifique el estado..." max="1" min="0" maxlength="1">
          </div>
          <br>

        @error('status')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        <br>
        @enderror

        <center>
        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Añadir</button>
        <a href="{{route('categories.index')}}" class="btn btn-dark"><i class="fa fa-reply"></i> Volver</a>
        <br>
        <br>
      </form>
</div>

@endsection
