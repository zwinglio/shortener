@extends('layouts.default')

@section('content')
    <section id="content">
        <div class="container">

            <div class="row justify-content-center mt-4">
                <div class="col-xl-6 text-center">
                    <h1>Encurtador de URL</h1>
                    <p class="small">v1.3.2</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    @error('url')
                        <div class="flex flex-row justify-center py-5">
                            <p class="text-red-500 bg-red-100 px-10 py-2 rounded ">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>

            @if (!session('shortened'))
                <div class="row justify-content-center mt-4">
                    <div class="col-xl-6">
                        <form action="/links/shorten" method="post" class="d-flex gap-2">
                            @csrf
                            <input type="url" name="url" class="form-control" placeholder="Link pra encurtar"
                                required>
                            <button class="btn btn-warning">🌍 Encurtar</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section id="shortened">
        @if (session('shortened'))
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="col-xl-6">
                        <h2>Link encurtado com sucesso!</h2>
                        <div class="card mt-3">
                            <div class="card-body">
                                <p><span class="fw-bold">Página:</span> {{ session('url') }}</p>
                                <p><span class="fw-bold">Título:</span> {{ session('title') }}</p>
                                <p><span class="fw-bold">Caracteres encurtados:</span> {{ session('count') }}</p>
                            </div>
                        </div>
                        <p class="mt-3">Copie o link abaixo 👇</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" name="shortened"
                                value="{{ url()->current() }}/{{ session('shortened') }}" readonly>
                            <button class="btn btn-success"
                                onclick="copyToClipboard('{{ url()->current() }}/{{ session('shortened') }}')">📋
                                Copiar</button>
                        </div>

                        <div id="alert-copied" class="alert alert-success mt-2 d-none">
                            Copiado com sucesso!
                        </div>

                        <a href="/" class="btn btn-outline-secondary mt-3 w-100">Encurtar outro link</a>
                    </div>
                </div>

                
            
        @endif
    </section>

    <section id="footer">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-xl-6 text-center">
                    <p>Feito com ❤️ por <a href="https://zwinglio.com">Zwinglio</a></p>
                </div>
            </div>
        </div>
    </section>


    <script>
        function copyToClipboard(text) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);

            // open toast
            var alert = document.getElementById("alert-copied");
            alert.classList.remove("d-none");
            setTimeout(function() {
                alert.classList.add("d-none");
            }, 2000);
        }
    </script>
@endsection
