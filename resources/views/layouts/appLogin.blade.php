<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link src="{{ asset('css/appLogin.css') }}" type="text/css" rel="stylesheet">
</head>

<body>
    <section class="hero is-primary is-fullheight">
        <!-- NAVBAR -->
        <nav class="navbar is-light has-background-light" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <!-- ICONE MENU RESPONSIVO -->
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <!-- ITENS DO MENU -->
            <div id="navbarBasicExample" class="navbar-menu is-light has-background-light">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons is-centered">
                            <a href="{{ route('register') }}" class="button is-primary titulo">
                                <strong>Cadastrar</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-4-widescreen">
                        <div class="box">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/appLogin.js') }}"></script>
</body>

</html>