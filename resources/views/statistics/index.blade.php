@extends('layouts.app')

@section('title', 'Boolbnb - Le tue Statistiche')

@section('content')
    <div class="container">
        <h1 class="py-3">Statistiche degli Appartamenti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome Appartamento</th>
                    <th>Totale Visualizzazioni</th>
                    <th>Totale Messaggi</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    <tr>
                        <td>{{ $apartment->title }}</td>
                        <td>{{ $apartment->visits_count }}</td>
                        <td>{{ $apartment->messages_count }}</td>
                        <td>
                            <a href="{{ route('statistics.show', $apartment->id) }}" class="btn btn-primary">Visualizza
                                Statistiche</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
