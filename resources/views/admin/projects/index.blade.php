@extends('layouts.admin')

@section('content')
    @include('partials.messages')



    <div class="text-end mb-5">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea un nuovo progetto</a>
    </div>

    <table class="table table-hover text-white rounded">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipologie</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    @if($project->title)
                    <td>{{ $project->title }}</td>
                    @else
                    <td>{{ $project->name }}</td>
                    @endif
                    @if($project->technologies)
                    @foreach ($project->technologies as $technologie)
                    <td>   {{$technologie->name}} </td>
                    @endforeach
                    @endif
                    <td>{{ $project->slug }}</td>
                    <td class="d-flex gap-3">
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        @if($project->title)
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                         @else
                        <a href="{{ route('admin.types.edit', $project->slug) }}" class="btn btn-warning">
                        @endif
                        <i class="fa-solid fa-gear"></i>
                        </a>
                        @if($project->title)
                        <form action="{{  route('admin.projects.destroy', $project->slug) }}" method="POST">
                        @else
                        <form action="{{  route('admin.types.destroy', $project->slug) }}" method="POST">
                        @endif
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    
    </table>


@endsection
