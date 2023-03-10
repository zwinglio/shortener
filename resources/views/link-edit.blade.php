@extends('layouts.default')

@section('content')
    <section id="link-edit">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-xl-6">
                    <h3>Editar Link</h3>
                    <p>
                        <strong>Link: </strong>{{ $link->url }}
                    </p>

                    @if(session('errors'))
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('link.update', $link->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="title">Título</label>
                        <input class="form-control mb-3" type="text" name="title" id="title"
                            value="{{ $link->title }}">
                        <label for="identifier">Identificador</label>
                        <input class="form-control mb-3" type="text" name="identifier" id="identifier"
                            value="{{ $link->identifier }}">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
