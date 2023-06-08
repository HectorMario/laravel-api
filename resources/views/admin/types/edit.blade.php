@extends('layouts.admin')
@section('content')
<h1 class="my-3">Modifica il tuo progetto {{ $type->name}}: </h1>
<form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
@csrf
@method('PUT')
    <label for="">tipologia</label>
    <input type="text" value="{{ old('name', $type->name) }}" name="name">
    <button>submit</button>
</form>
@endsection