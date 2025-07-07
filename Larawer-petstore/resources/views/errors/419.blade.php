@extends('layouts.app')

@section('content')
    <h1>Błąd 419</h1>
    <p>Sesja wygasła. Odśwież stronę i spróbuj ponownie.</p>
    <a href="{{ route('pets.index') }}" class="btn btn-primary">Odśwież</a>
@endsection
