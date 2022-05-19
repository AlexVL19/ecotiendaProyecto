@extends('layouts.app')

@section('title', 'Creación de producto')

@section('contents')

<div class="container border rounded mt-5" style="width: 600px; background-color: #edf7ef">
    <h3 class="text-center mt-4">Crear un producto</h3>
    <br>
    <form method="POST" action="/products" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="name">Nombre del producto</label>
          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Escriba el nombre del producto...">
        </div>
        <br>

        <div class="form-group">
            <label for="name">Precio</label>
            <input type="number" class="form-control" id="cost" name="cost" placeholder="Especifique el precio..." min="0">
          </div>
          <br>

        <div class="form-group">
            <label for="email">Descripción</label>
            <input type="textarea" class="form-control" id="desc" name="desc" placeholder="Describa el producto...">
          </div>
        <br>

        <div class="form-group">
            <label for="name">Cantidad</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Escriba la cantidad de existencias..." min="0">
        </div>
        <br>

        <div class="form-group">
            <label for="name">Estado</label>
            <input type="number" class="form-control" id="status" name="status" placeholder="Especifique el estado del producto..." min="0" max="1">
        </div>
        <br>

        <div class="form-group">
            <label for="name">Imagen del producto</label>
            <br>
            <input type="file" id="image" name="image">
        </div>
        <br>

        <div class="form-group">
            <label for="name">Categoría</label>
                <select class="custom-select" id="cat_id" name="cat_id">
                    @foreach ($catobj as $cat)

                    <option id="cat_id" value="{{$cat->id}}">{{$cat->cat_name}}</option>

                    @endforeach
                </select>
        </div>
        <br>

        <center>
        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Añadir</button>
        <a href="{{route('products.index')}}" class="btn btn-dark"><i class="fa fa-reply"></i> Volver</a>
        <br>
        <br>
      </form>
</div>

@endsection
