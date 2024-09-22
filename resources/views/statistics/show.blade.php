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

        <div class="row row-cols-1 row-cols-md-2 g-5">

            {{-- GRAFICO DELLE VISUALIZZAZIONI --}}
            <div class="col">
                <canvas id="visitsChart" class="w-100"></canvas>
            </div>

            {{-- GRAFICO DEI MESSAGGI --}}
            <div class="col">
                <canvas id="messagesChart" class="w-100"></canvas>
            </div>

            {{-- TABELLA VISUALIZZAZIONI --}}
            <div class="col">

                @if ($visits->isEmpty())
                    <p class="alert alert-warning">Non ci sono visualizzazioni registrate per questo appartamento.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data (ANNO/MESE)</th>
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

            </div>

            {{-- MOSTRO I TOTALI O UN LOG SE ASSENTI --}}
            <div class="col">
                @if ($messages->isEmpty())
                    <p class="alert alert-warning">Non ci sono messaggi registrati per questo appartamento.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data (ANNO/MESE)</th>
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
