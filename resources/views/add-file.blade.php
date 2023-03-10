@extends('layouts.default')

@section('content')

<section id="add-file">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <form action="create-file" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Título">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Arquivo</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="Arquivo">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    
@endsection