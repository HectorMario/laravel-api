@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="text-end">
        {{ $project->slug }}
    </div>
    <h2>technologies</h2>
    @foreach ($project->technologies as $technology)

        <p>{{$technology->name }}</p>
    @endforeach
    <p class="mt-4">{{ $project->content }}</p>
    <div class="cta d-flex gap-3">

        <a href="{{ route('admin.projects.index') }}" class="btn btn-success">
            Torna dietro</i>
        </a>
        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger deletBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
        
    </div>
   

@endsection
