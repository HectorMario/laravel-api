@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="my-3">Inserisci il tuo project : </h1>


        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Inserisci titolo</label>
                <input type="text" name="title" class="form-control mx-auto my-3 w-50 @error('title') is-invalid @enderror" id="title"
                    placeholder="Inserisci titolo" value="{{ old('title') }}">
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
                <label for="content">Inserisci descrizione</label>
                <input type="text" name="content"
                    class="form-control my-3 mx-auto w-50" id="content" placeholder="Inserisci descrizione" value="{{ old('content') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Ritorna nella lista</a>

        </form>

    </div>
@endsection
