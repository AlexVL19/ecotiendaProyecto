@extends('layouts.app')

@section('title', 'Edición de producto')

@section('contents')

<div class="container border rounded mt-5" style="width: 600px; background-color: #edf7ef">
    <h3 class="text-center mt-4">Editar un producto</h3>
    <br>
    <form method="POST" action="/products/{{$prodobj->id}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
          <label for="name">Nombre del producto</label>
          <input type="text" class="form-control" id="product_name" name="product_name" value="{{$prodobj->product_name}}">
        </div>
        <br>

        <div class="form-group">
            <label for="name">Precio</label>
            <input type="number" class="form-control" id="cost" name="cost" value="{{$prodobj->cost}}" min="0">
          </div>
          <br>

        <div class="form-group">
            <label for="email">Descripción</label>
            <input type="textarea" class="form-control" id="desc" name="desc" value="{{$prodobj->desc}}">
          </div>
        <br>

        <div class="form-group">
            <label for="name">Cantidad</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$prodobj->quantity}}" min="0">
        </div>
        <br>

        <div class="form-group">
            <label for="name">Estado</label>
            <input type="number" class="form-control" id="status" name="status" value="{{$prodobj->status}}" min="0" max="1">
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
        <button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> Actualizar</button>
        <a href="{{route('products.index')}}" class="btn btn-dark"><i class="fa fa-reply"></i> Volver</a>
        <br>
        <br>
      </form>
</div>

@endsection
