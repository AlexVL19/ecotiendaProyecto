@extends('layouts.app')

@section('title', 'Categorías')

@section('contents')

    <div class="container mt-3 mb-5">
        <h3 class="text-center">Lista de categorías</h3>
        <br>
        <center>
            <a href="{{ route('categories.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Añadir...</a>
            <br>
            <br>
            <div>
                <div class="mr-5 ml-5">
                    <div class="">
                        <form action="{{ route('categories.search')}}" method="GET" role="search">

                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Buscar por categoría..." id="term" size="6">
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
        @foreach ($catobj as $cat)
        <div class="col ml-2 mr-2 mb-2">

            @if ($cat->status == 1)

                <div class="alert alert-success" role="alert" style="width: 450px">
                    <b>Nombre de categoría:</b> {{$cat->cat_name}}
                    <hr>
                    <b>Estado:</b> {{$cat->status}}
                    <hr>
                    <b>Categoría creada en:</b> {{$cat->created_at}}
                    <hr>
                    <a href="categories/{{$cat->id}}/edit" class="btn btn-dark"><i class="fa fa-pencil"></i> Editar</a>
                    <form class="form-group" action="categories/{{$cat->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">
                            <i class="fa fa-trash"></i> Borrar
                        </button>
                    </form>
                </div>

            @else

                <div class="alert alert-danger" role="alert" style="width: 450px">
                    <b>Nombre de categoría:</b> {{$cat->cat_name}}
                    <hr>
                    <b>Estado:</b> {{$cat->status}}
                    <hr>
                    <b>Categoría creada en:</b> {{$cat->created_at}}
                    <hr>
                    <a href="categories/{{$cat->id}}/edit" class="btn btn-dark"><i class="fa fa-pencil"></i> Editar</a>
                    <form class="form-group" action="categories/{{$cat->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">
                            <i class="fa fa-trash"></i> Borrar
                        </button>
                    </form>
                </div>

            @endif

        </div>
        @endforeach
    </div>

@endsection
