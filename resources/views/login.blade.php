@extends('layouts.default')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <h2 class="mb-3">Login</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">

                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach

                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="/auth" method="POST">
                                @csrf
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control mb-2" type="email" name="email" placeholder="Email">
                                <label for="email" class="form-label">Senha</label>
                                <input class="form-control mb-2" type="password" name="password" placeholder="Password">
                                <button type="submit" class="btn btn-primary w-100 mt-2">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
