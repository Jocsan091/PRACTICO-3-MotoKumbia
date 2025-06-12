<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'MotoKumbia')</title>

  
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('welcome') }}">MotoKumbia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        
        <li class="nav-item {{ request()->routeIs('modulo1') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('modulo1') }}">
            Clientes
            @if(request()->routeIs('modulo1'))<span class="sr-only">(current)</span>@endif
          </a>
        </li>

        
        <li class="nav-item {{ request()->routeIs('motorcycles.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('motorcycles.index') }}">
            Motos
            @if(request()->routeIs('motorcycles.*'))<span class="sr-only">(current)</span>@endif
          </a>
        </li>

        
        <li class="nav-item {{ request()->routeIs('repairs.*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('repairs.index') }}">
            Reparaciones
            @if(request()->routeIs('repairs.*'))<span class="sr-only">(current)</span>@endif
          </a>
        </li>

      </ul>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2"
               type="search"
               placeholder="Buscar"
               aria-label="Buscar">
        <button class="btn btn-outline-success my-2 my-sm-0"
                type="submit">
          Buscar
        </button>
      </form>
    </div>
  </nav>

  <div class="container mt-4">
    <h1 class="mb-4">@yield('page_title', 'Panel')</h1>
    @yield('content')
  </div>

  {{-- Scripts --}}
  <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
