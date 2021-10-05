<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IFBA Campus Eunápolis</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.13/dist/jBox.all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @auth
        <br>
        <!-- CABEÇALHO TOPO-->
        <div class="container is-fluid">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <div class="columns">
                            <div class="column is-4">
                             
                            </div>
                            <div class="column is-4">

                            </div>

                            <div class="column">
                                
                                <div class="notification is-primary">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>

                                    Seja bem-vindo, <strong>{{Auth::user()->name}}</strong>.
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @endauth

        <!-- NAVBAR-->
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('inicio') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>

                    <a class="navbar-item" href="{{ route('politicaTerritorial') }}">
                        <i class="fa fa-balance-scale"></i>
                        Politica Territorial
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            O território
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('caracterizacaoHistorico') }}">
                                Caracterização e histórico
                            </a>
                            <a class="navbar-item" href="{{ route('coordenacao') }}">
                                Coordenação
                            </a>
                            <a class="navbar-item" href="{{ route('nucleoDiretivo') }}">
                                Núcleo Diretivo
                            </a>

                            <a class="navbar-item" href="{{ route('membrosDoTerritorio.index') }}">
                                Membros do território
                            </a>

                            <a class="navbar-item" href="{{ route('municipios.index') }}">
                                Municípios
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ route('contato') }}">
                                Contatos
                            </a>
                        </div>
                    </div>

                    <a class="navbar-item" href="{{ route('agenda') }}">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        Agenda
                    </a>

                    <a class="navbar-item" href="{{ route('agendaDoTerritorio') }}">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        Agenda do Território
                    </a>

                    <a class="navbar-item" href="{{ route('projetosDesenvolvimentoRural') }}">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        Projetos Desenvolvimento Rural
                    </a>

                    <a class="navbar-item" href="{{ route('noticias') }}">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Notícias
                    </a>

                    <a class="navbar-item" href="{{ route('documentos') }}">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        Documentos
                    </a>

                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            @auth
                            <a href="{{ route('sair') }}" class="button is-light telaCarregamento">Sair</a>
                            @else
                            @if (Route::has('login'))
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button is-primary">Inscrever-se</a>
                            @endif

                            <a href="{{ route('login') }}" class="button is-light">Entrar</a>
                            @endauth

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        @auth
        <div class="fab-container">
            <!-- ÍCONE BASE -->
            <div class="fab fab-icon-holder">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </div>

            <!-- DEMAIS ÍCONES -->
            <ul class="fab-options">
                <li>
                    <span class="fab-label">Novo membro do território</span>
                    <a href="{{ route('membrosDoTerritorio.index') }}">
                        <div class="fab-icon-holder">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <span class="fab-label">Novo município</span>
                    <a href="{{ route('municipios.index') }}">
                        <div class="fab-icon-holder">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <span class="fab-label">Novo banner</span>
                    <a href="{{ route('banner.index') }}">
                        <div class="fab-icon-holder">
                            <i class="fa fa-flag" aria-hidden="true"></i>
                        </div>
                    </a>

                </li>
                <li>
                    <span class="fab-label">Nova publicação</span>
                    <a href="{{ route('home') }}">
                        <div class="fab-icon-holder">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        @endauth
        <main class="py-4">
            @yield('content')
        </main>

        <!-- FOOTER -->
        @include('includes.footer')
    </div>

    <script src="jquery/jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.13/dist/jBox.all.min.js"></script>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>


    @yield('script')
</body>

</html>