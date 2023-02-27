<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encurtador Zwinglio</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 transition-all" data-theme="emerald">
    <div class="flex flex-row justify-center py-5">
        <div class="basis-8/12">
            <h1 class="text-4xl font-bold text-center">Encurtador de URL</h1>
        </div>
    </div>

    @error('url')
        <div class="flex flex-row justify-center py-5">
            <p class="text-red-500 bg-red-100 px-10 py-2 rounded ">{{ $message }}</p>
        </div>
    @enderror

    @if (!session('shortened'))
        <div class="flex flex-row justify-center py-5">
            <div class="basis-4/12 flex flex-row justify-center">
                <form action="/links/shorten" method="post" class="flex flex-1 gap-5">
                    @csrf
                    <input type="link" name="url"
                        class="rounded-md p-2 w-3/4 border-2 border-amber-200 focus:border-amber-600"
                        placeholder="Link pra encurtar" required>
                    <button class="rounded-md bg-amber-500 p-2 w-1/4 hover:bg-green-400">🌍 Encurtar</button>
                </form>
            </div>
        </div>
    @endif

    @if (session('shortened'))
        <div class="flex flex-row justify-center py-5">
            <div class="basis-4/12 flex flex-row justify-center">
                <div class="flex flex-1 gap-5">
                    <input type="text" name="shortened"
                        class="rounded-md p-2 w-3/4 border-2 border-amber-200 focus:border-amber-600"
                        value="{{ url()->current() }}/{{ session('shortened') }}" readonly>
                    <button class="rounded-md bg-amber-500 p-2 w-1/4 hover:bg-green-400"
                        onclick="copyToClipboard('{{ url()->current() }}/{{ session('shortened') }}')">📋
                        Copiar</button>
                </div>
            </div>
        </div>
    @endif

    <section id="footer">
        <div class="flex flex-row justify-center py-5">
            <div class="basis-8/12">
                <p class="text-center text-gray-500">Feito com ❤️ por <a href="zwinglio.com"
                        class="text-blue-500">Zwinglio</a></p>
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
        }
    </script>
</body>

</html>
