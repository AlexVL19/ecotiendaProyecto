@extends('layouts.app')

@section('title', 'Carrito')

@section('contents')

    <div class="container mt-3 mb-5">
        <h3 class="text-center">Carrito de compras</h3>
        <br>
        <center>
            <p><i>Bienvenido al carrito de compras, aquí podrás ordenar productos.</i></p>
            @if (!auth()->check())
                <br>
                <p><i>¡Debes iniciar sesión para comprar productos!</i></p>
            @endif
            <hr class="text-center" style="line-height: 250px">
        </center>
    </div>

        <center>
        <div class="row justify-content-center">
                @foreach ($prodobj as $pro)

                @if ($pro->quantity != 0 && auth()->check())

                <div class="col-4">
                    <div class="card mt-3" style="width: 17rem; background-color: #d4edda; color:#155727; border-color: #b1dfbb">
                        <img class="card-img-top" src="{{ Storage::url($pro->image) }}" style="height: 200px; width: 17rem; border-style: rounded;">
                        <div class="card-body">
                        <h5 class="card-title">{{$pro->product_name}}</h5>
                        <p class="card-text">{{$pro->desc}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #d4edda;"><b>Precio:</b> {{$pro->cost}}</li>
                        <li class="list-group-item" style="background-color: #d4edda;"><b>Cantidad:</b>
                            <br>
                            <form action="/addProduct" method="POST">
                                @csrf
                                <input type="number" id="quantity" name='quantity' oninput="multiplicar()" max="{{$pro->quantity}}" min="0">
                                <input type="hidden" id="product_name" name='product_name' value="{{$pro->product_name}}">
                                <input type="hidden" id="cost" name='cost' oninput="multiplicar()" value="{{$pro->cost}}">
                                <input type="hidden" id="userid" name='userid' value="{{auth()->user()->id}}">
                                <input type="hidden" id="final_cost" name='final_cost' oninput="multiplicar()">
                        </li>
                        </ul>
                        <div class="card-body">
                            <button type="submit" class="btn btn-success" id="addProduct"><i class="fa fa-cart-plus"></i> Añadir al carrito</button>
                        </form>
                        </div>
                    </div>
                </div>

                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="{{ asset('js/toast.js')}}"></script>

                @elseif ($pro->quantity)

                <div class="col-4">
                    <div class="card mt-3" style="width: 17rem; background-color: #d4edda; color:#155727; border-color: #b1dfbb">
                        <img class="card-img-top" src="{{ Storage::url($pro->image) }}" style="height: 200px; width: 17rem; border-style: rounded;">
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
                        </div>
                    </div>
                </div>

                @endif

                @endforeach
        </div>
        </center>
@endsection
