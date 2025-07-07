@extends('layouts.app')

@section('content')
    <h1>Błąd 500</h1>
    <p>Wystąpił wewnętrzny błąd serwera.</p>
    <a href="{{ route('pets.index') }}" class="btn btn-primary">Spróbuj ponownie</a>
@endsection
