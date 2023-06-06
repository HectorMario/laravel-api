@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-5">Buongiorno {{ Auth::user()->name }}</h1>
@endsection
