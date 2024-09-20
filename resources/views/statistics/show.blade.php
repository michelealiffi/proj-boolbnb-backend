@extends('layouts.app')

@section('title', 'Boolbnb - Le tue Statistiche')

@section('content')
    <div class="container">
        <h1 class="py-3">Statistiche per: {{ $apartment->title }}</h1>
        <p><strong>Indirizzo:</strong> {{ $apartment->address }}</p>
        <p><strong>Descrizione:</strong> {{ $apartment->description }}</p>

        <hr>

        <h2>Statistiche delle visualizzazioni</h2>
        @if ($visits->isEmpty())
            <p>Non ci sono visualizzazioni registrate per questo appartamento.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Data (YYYY/MM)</th>
                        <th>Visualizzazioni Totali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $visit)
                        <tr>
                            <td>{{ $visit->year }}/{{ str_pad($visit->month, 2, '0', STR_PAD_LEFT) }}</td>
                            {{-- Usa il primo giorno del mese --}}
                            <td>{{ $visit->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <hr>

        <h2>Statistiche dei messaggi ricevuti</h2>
        @if ($messages->isEmpty())
            <p>Non ci sono messaggi registrati per questo appartamento.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Data (YYYY/MM)</th>
                        <th>Messaggi Totali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->year }}/{{ str_pad($message->month, 2, '0', STR_PAD_LEFT) }}</td>
                            {{-- Usa il primo giorno del mese --}}
                            <td>{{ $message->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
