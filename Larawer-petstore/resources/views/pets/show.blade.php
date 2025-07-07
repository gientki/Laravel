@extends('layouts.app')

@section('content')
    <h1>Szczegóły zwierzaka</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nazwa:</strong> {{ $pet->name }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $pet->status }}</li>
        <li class="list-group-item"><strong>Kategoria:</strong> {{ $pet->category }}</li>
        <li class="list-group-item"><strong>Tagi:</strong> {{ $pet->tags }}</li>
        @if($pet->photo_url)
            <li class="list-group-item">
                <strong>Zdjęcie:</strong><br>
                <img src="{{ $pet->photo_url }}" alt="Zdjęcie" class="img-fluid mt-2">
            </li>
        @endif
    </ul>

    <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-warning">Edytuj</a>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Powrót do listy</a>
@endsection
