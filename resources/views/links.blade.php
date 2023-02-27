<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encurtador - Last</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 transition-all" data-theme="emerald">

    <table class="table table-auto border-collapse border border-slate-500">
        <thead class="border-slate-500">
            <tr>
                <th>Title</th>
                <th>Link</th>
                <th>Encurtado</th>
                <th>Visitas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <td>{{ $link->title }}</td>
                    <td>{{ $link->url }}</td>
                    <td>{{ url()->current() }}/{{ $link->identifier }}</td>
                    <td>{{ $link->clicks }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
