<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leo's Karting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="icon" href="imagenes/logo.webp">
  </head>
  <body>
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
        {{ session('error') }}
    </div>
@endif

   <header class="bg-danger p-3 d-flex justify-content-between align-items-center">
    <img src="{{ asset('imagenes/logo.webp') }}" alt="logo" width="120">
    <h1 class="text-white m-0">Kartings Pro</h1>

    <div>
        @guest
            <a href="{{ route('login') }}" class="btn btn-light">Iniciar sesión</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-light">Cerrar sesión</button>
            </form>
        @endauth
    </div>
</header>
    <div class="container">
        @yield('contenido')
    </div>
    <footer class="bg-dark fixed-bottom">
     <p class="text-white">Leo's Karting </p> <br>
     <p class="text-white">© 2025 Todos los derechos reservados</p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script>
    // Esperar 3 segundos y luego ocultar las alertas suavemente
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.classList.add('fade'); // agrega clase de Bootstrap
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 500); // se elimina del DOM
        });
    }, 3000); // 3000 milisegundos = 3 segundos
</script>

  </body>
</html>