@extends('layouts.app')

@section('content')
    <h1>Błąd 404</h1>
    <p>Strona nie została znaleziona.</p>
    <a href="{{ route('pets.index') }}" class="btn btn-primary">Powrót do strony głównej</a>
@endsection
