@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Modifica il tuo progetto {{ $project->title}}: </h1>
        <div class="">

            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- serve per sovrascrivere il metodo post dato che il form supporta solo get e post -->
                <!-- il value è per far si che quando si tenta di modificare un dato, questo rimanga salvato -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <p>select the technologies</p>
            <div class="btn-group" role="group" >
            @foreach ($technologies as $technology)
            <input type="checkbox" class="btn-check" name="technology_id[]" value="{{$technology->id}}" id="{{$technology->name}}" autocomplete="off">
            <label class="btn btn-outline-primary" for="{{$technology->name}}">{{$technology->name}}</label>
            @endforeach
            </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description', $project->description) }}</textarea>

                </div>
                <div class="cta d-flex-gap-3">
                    <input type="submit" value="Salva" class="btn btn-primary">
                    <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Annulla</a>
                </div>
            </form>

        </div>

    </div>

  

@endsection
