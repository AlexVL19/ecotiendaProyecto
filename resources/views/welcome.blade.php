@extends('layouts.app')

@section('title', 'Página principal')

@section('contents')
<center>
    <div class="container-fluid mt-5 mb-3 rounded" id="fondo1">
        <div id="titulo">
            <h2><i>Una experiencia de compra redefinida.</i></h2>
            <br>
            <h5>¡Bienvenid@ a D-Compras! Aquí podrás encontrar todo lo relacionado con productos del campo.</h5>
        </div>
    </div>

    <div class="container-fluid mt-2 mb-3">
        <h2><i>Sobre el sistema</i></h2>
        <hr style="width: 250px">
        <br>
        <p>D-Compras es un sistema de ventas que tiene como objetivo mejorar la experiencia de compra de víveres en línea.
            <br>
            Este sistema se compone de varios módulos con el propósito de hacer compras de una manera más segura y confiable
            <br>
            y permite a sus administradores manejar aspectos relevantes del sistema como sus usuarios o los productos que salen en
            <br>
            el mercado cada semana. ¡Echa un vistazo a nuestros productos!
        </p>
        <br>
        <a href="{{route('cart.index')}}" class="btn btn-success"><i class="fa fa-shopping-basket"></i> Ver productos</a>
    </div>
</center>
@endsection
