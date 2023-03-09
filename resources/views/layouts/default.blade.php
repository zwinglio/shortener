<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encurtador Zwinglio</title>
    @vite('resources/css/app.scss')
    @vite('resources/css/home.css')
</head>

<body>
    <section id="navbar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <nav class="navbar navbar-expand-lg">
                        <a href="/" class="navbar-brand">Encurtador</a>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto">
                                @if (!auth()->check())
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">Login</a>
                                    </li>
                                @endif
                                @if (auth()->check())
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/logout">Logout</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    @vite('resources/js/app.js')
</body>

</html>
