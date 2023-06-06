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
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td class="d-flex gap-3">
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger deletBtn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    
    </table>


@endsection
