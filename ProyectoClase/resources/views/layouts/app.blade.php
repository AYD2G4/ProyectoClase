<!DOCTYPE html>
<!-- saved from url=(0030)https://bootswatch.com/flatly/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>[AYD2] CHOCOAIRLINES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  </head>
  <body style="" class="">
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="">
      <div class="container">
        <a href="https://bootswatch.com/" class="navbar-brand">[AYD2] CHOCOAIRLINES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            @guest
            <ul class="nav navbar-nav ml-auto">
                    <li><a class="nav-link"  href="{{ url('/ListarRegistroVuelo') }}">Listar Registro Vuelo</a></li>
                    <li><a class="nav-link"  href="{{ url('/VerReservaciones') }}">Reservaciones</a></li>
                    <li><a class="nav-link"  href="{{ url('/VerCompras') }}">Compras</a></li>
                    <li><a class="nav-link"  href="{{ url('/VerCarrito') }}">Carrito</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    </ul>
            @else
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="https://bootswatch.com/flatly/#" id="download" aria-expanded="false">Clientes <span class="caret"></span></a>
                <div class="dropdown-menu" aria-labelledby="download">
                  <a class="dropdown-item" href="{{ url('/clientes') }}">Clientes Atendidos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/clientes') }}">Todos los Clientes</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/flujos') }}">Flujos Asignados</a>
              </li>

            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                  </ul>
            @endguest

        </div>
      </div>
    </div>
<br />
<br />
<br />
<br />
    <div class="container">
      <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
