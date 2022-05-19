<!doctype html>
<html lang="es">
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/navbarStyles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminStyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>@yield('title') - Ecotienda</title>
  </head>
  <body>

      <!-- Barra de navegación -->
        @if(auth()->check() && auth()->user()->role == 'admin')

            <nav class="navbar navbar-expand navbar-dark bg-dark">
                    <div class="nav navbar-nav">
                        <img class="navbar-brand" style="width: 50px; height: 50px" src="{{ asset('img/logo.png') }}">
                        <a class="nav-item nav-link active" href="/admin">D-Compras</a>
                        <a class="nav-item nav-link" href="{{ route('userList.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a>
                        <a class="nav-item nav-link" href="{{ route('categories.index')}}"><i class="fa fa-list" aria-hidden="true"></i> Categorías</a>
                        <a class="nav-item nav-link" href="{{ route('products.index')}}"><i class="fa fa-leaf" aria-hidden="true"></i> Productos</a>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('login.show') }}"><i class="fa fa-address-book" aria-hidden="true"></i> Tu perfil</a>
                                <a class="dropdown-item" href="{{ route('login.destroy') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Cerrar sesión</a>
                            </div>
                        </li>
                    </div>
                </nav>

        @elseif(auth()->check())

            <nav class="navbar navbar-expand navbar-dark bg-dark">
                <div class="nav navbar-nav">
                    <img class="navbar-brand" style="width: 50px; height: 50px" src="{{ asset('img/logo.png') }}">
                    <a class="nav-item nav-link active" href="/">D-Compras</a>
                    <a class="nav-item nav-link" href="{{ route('cart.index')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito</a>
                    <a class="nav-item nav-link" href="/checkout"><i class="fa fa-dollar" aria-hidden="true"></i> Caja</a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('cart.index')}}" id="navbardrop" data-toggle="dropdown">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('login.show') }}"><i class="fa fa-address-book" aria-hidden="true"></i> Tu perfil</a>
                            <a class="dropdown-item" href="{{ route('login.destroy') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Cerrar sesión</a>
                        </div>
                    </li>
                </div>
            </nav>

        @else

            <nav class="navbar navbar-expand navbar-dark bg-dark">
                <div class="nav navbar-nav">
                    <img class="navbar-brand" style="width: 50px; height: 50px" src="{{ asset('img/logo.png') }}">
                    <a class="nav-item nav-link active" href="/">D-Compras</a>
                    </i><a class="nav-item nav-link hover" href="{{ route('register.index')}}"><i class="fa fa-address-card" aria-hidden="true"></i> Registrarse</a>
                    <a class="nav-item nav-link" href="{{ route('login.index')}}"><i class="fa fa-key" aria-hidden="true"></i> Ingresar</a>
                </div>
            </nav>

        @endif

    <!-- Contenido -->
    <div class="container">
    @yield('contents')
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small mt-4" id="footer">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
        <b>© 2022 Copyright: Alexis Valencia Acevedo</b>
        <br>
        <br>
        <a href="https://github.com/AlexVL19"><i class="fa fa-github btn btn-dark"></i></a> GitHub
        </div>
        <!-- Copyright -->

      </footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/confirmPurchase.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

  </body>
</html>
