<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <!-- FontAwesome -->
            <script src="https://kit.fontawesome.com/388ade4391.js" crossorigin="anonymous"></script>

        <!-- Font do google -->
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans" rel="stylesheet">

        <!-- Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>@yield('title')</title>

    </head>
    <body>
        <header>            
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a class="navbar-brand">
                        <img src="/img/logo.png" alt="logo" />
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link"><i class="fa-solid fa-thumbtack"></i> Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link"><i class="fa-solid fa-calendar-plus"></i> Criar Eventos</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link"><i class="fa-solid fa-user-gear"></i> Usuário</a>
                            </li>   
                            <li class="nav-item">
                                <form action="/logout" method="POST" style="display: inline;">
                                    @csrf
                                    <a href="#" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="fa-solid fa-door-open"></i> Sair
                                    </a>
                                </form>
                            </li>                     
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link"><i class="fa-solid fa-person-through-window"></i> Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link"><i class="fa-solid fa-address-card"></i> Cadastrar-se</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                    @endif
                    
                    @yield('content')
                </div>
            </div>  
        </main>

        <footer>
            <p>Todos os direitos reservados &copy; 2024</p>
        </footer>

        <script src="   https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
