@extends('layouts.app')

@section('title', 'Boolbnb - Le tue Statistiche')

@push('script')
    <!-- Usando Vite -->
    @vite(['resources/js/statistics/main.js'])
@endpush

@section('content')
    <div class="container">
        <h1 class="py-3">Statistiche per: {{ $apartment->title }}</h1>
        <p><strong>Indirizzo:</strong> {{ $apartment->address }}</p>
        <p><strong>Descrizione:</strong> {{ $apartment->description }}</p>

        <hr>

        <div class="chart-container">
            <div class="chart">
                <canvas id="visitsChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="messagesChart"></canvas>
            </div>
        </div>

        <div class="d-flex">
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
                                <td>{{ $visit->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <hr>

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
                                <td>{{ $message->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>

    <style>
        .chart-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .chart {
            width: 45%;
            height: 300px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Passa i dati dal controller al file JavaScript
        window.visitsData = @json($visits);
        window.messagesData = @json($messages);
    </script>
@endsection
