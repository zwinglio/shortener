<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encurtador de Link</title>
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


    <section id="footer">
        <div class="container mt-4">
            <div class="row justify-content-center mt-4 py-4">
                <hr>
                <div class="col-xl-8 text-center d-flex justify-content-between">
                    <p>Feito com ❤️ por <a href="https://zwinglio.com">Zwinglio</a></p>
                    <p class="small opacity-75">
                        📢 <a href="https://zwinglioo.notion.site/2aa16ea48d604573be3c400b928e5058?v=a93ce6628ef94c8d93e02d892bd75f18" target="_blank">Changelog</a> | 
                        🗺️ <a href="https://zwinglioo.notion.site/cfc3a37e5acb43368b129c655adc5362?v=956a474ae4d446e79aacb002a54398ec" target="_blank">Roadmap</a></p>
                </div>
            </div>
        </div>
    </section>

    @vite('resources/js/app.js')
</body>

</html>
