@extends('layouts.default')

@section('content')
    <section id="dashboard">
        <div class="container">
            <div class="row justify-content-center align-items-center mt-4">
                <div class="col-xl-6">
                    <h2 class="mb-3">Dashboard</h2>

                    <div class="card">
                        <div class="card-body">
                            <p>Olá, {{ auth()->user()->name }}</p>
                            <p>Seu e-mail é {{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <a href="/" class="btn btn-warning mt-3">
                        Adicionar link 🔗
                    </a>
                    <a href="#" class="btn btn-outline-secondary mt-3 disabled">
                        Adicionar Arquivo 📂
                    </a>
                </div>
            </div>
            <hr>

            <div class="row justify-content-center mt-4">
                <div class="col-xl-8">
                    <h3>Lista de links</h3>
                    <div class="p-3">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Link</th>
                                    <th>ID</th>
                                    <th>Clicks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $link->title }}</td>
                                        <td>{{ $link->url }}</td>
                                        <td>
                                            <a href="{{ url()->to('/') }}/{{ $link->identifier }}"
                                                target="_blank">{{ $link->identifier }}
                                            </a>
                                        </td>
                                        <td>{{ $link->clicks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
