@extends('layouts.app')

@section('content')
    <h1>Edytuj zwierzaka</h1>

    <form method="POST" action="{{ route('pets.update', $pet->id) }}">
                @csrf
        @method('PUT')
        @include('pets.form')
        <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
@endsection
