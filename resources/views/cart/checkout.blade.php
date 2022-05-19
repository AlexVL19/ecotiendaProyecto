@extends('layouts.app')

@section('title', 'Caja')

@section('contents')

<div class="container mt-3 mb-5">
    <h3 class="text-center">Lista de órdenes</h3>
    <br>
    <center>
    <hr class="text-center" style="line-height: 250px">
    </center>
</div>

<center>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($order as $ord)
            <tr>
                <td>{{$ord->product_name}}</td>
                <td>{{$ord->cost}}</td>
                <td>{{$ord->quantity}}</td>
                <td>{{$ord->final_cost}}</td>
                <td>
                    <a href="/deleteItem/{{$ord->id}}" class="btn btn-danger"><i class="fa fa-close"></i> Quitar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="/clear" class="btn btn-dark mr-2"><i class="fa fa-eraser"></i> Quitar todo</a>
    <button class="btn btn-success" id="confirm"><i class="fa fa-check-circle"></i> Confirmar</button>

</center>

@endsection
