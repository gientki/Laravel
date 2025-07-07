@extends('layouts.app')

@section('content')
    <h1>Dodaj zwierzaka</h1>

    <form method="POST" action="{{ route('pets.store') }}">
        @csrf
        @include('pets.form')
        <button type="submit" class="btn btn-success">Zapisz</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
@endsection
