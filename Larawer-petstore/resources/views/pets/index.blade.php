@extends('layouts.app')

@section('content')
    <h1>Lista zwierzaków</h1>
    <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Dodaj zwierzaka</a>

    @if($pets->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Status</th>
                    <th>Kategoria</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->status }}</td>
                        <td>{{ $pet->category }}</td>
                      
                        <td>
                        <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-sm btn-info">Pokaż</a>

                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-warning">Edytuj</a>
                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Czy na pewno usunąć?')" class="btn btn-sm btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Brak zwierzaków w bazie.</p>
    @endif
@endsection
