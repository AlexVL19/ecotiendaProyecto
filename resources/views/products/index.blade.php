@extends('layouts.app')

@section('title', 'Productos')

@section('contents')

    <div class="container mt-3 mb-5">
        <h3 class="text-center">Lista de productos</h3>
        <br>
        <center>
            <a href="{{ route('products.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Añadir...</a>
            <br>
            <br>
            <div>
                <div class="mr-5 ml-5">
                    <div class="">
                        <form action="{{route('products.search')}}" method="GET" role="search">

                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Buscar por producto..." id="term" size="6">
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
            @foreach ($prodobj as $pro)

            @if ($pro->quantity != 0)

            <div class="col-4">
                <div class="card mt-3" style="width: 18rem; background-color: #d4edda; color:#155727; border-color: #b1dfbb">
                    <img class="card-img-top" src="{{ Storage::url($pro->image) }}" style="height: 200px; width: 286px; border-style: rounded;">
                    <div class="card-body">
                    <h5 class="card-title">{{$pro->product_name}}</h5>
                    <p class="card-text">{{$pro->desc}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="background-color: #d4edda;"><b>Precio:</b> {{$pro->cost}}</li>
                    <li class="list-group-item" style="background-color: #d4edda;"><b>Cantidad:</b> {{$pro->quantity}}</li>
                    <li class="list-group-item" style="background-color: #d4edda;"><b>ID categoría:</b> {{$pro->cat_id}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/products/{{$pro->id}}/edit" class="btn btn-dark"><i class="fa fa-pencil"></i> Editar</a>
                        <form class="form-group" action="products/{{$pro->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-1">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @else

            <div class="col-4">
                <div class="card mt-3" style="width: 18rem; background-color: #f8d7da; color: #7e1c24; border-color:#f1b0b7">
                    <img class="card-img-top" src="{{ Storage::url($pro->image) }}" style="height: 200px; width: 286px; border-style: rounded;">
                    <div class="card-body">
                    <h5 class="card-title">{{$pro->product_name}}</h5>
                    <p class="card-text">{{$pro->desc}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="background-color: #f8d7da;"><b>Precio:</b> {{$pro->cost}}</li>
                    <li class="list-group-item" style="background-color: #f8d7da;"><b>Cantidad:</b> {{$pro->quantity}}</li>
                    <li class="list-group-item" style="background-color: #f8d7da;"><b>ID categoría:</b> {{$pro->cat_id}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/products/{{$pro->id}}/edit" class="btn btn-dark"><i class="fa fa-pencil"></i> Editar</a>
                        <form class="form-group" action="products/{{$pro->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-1">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @endif

            @endforeach

        </div>
        </center>
@endsection
