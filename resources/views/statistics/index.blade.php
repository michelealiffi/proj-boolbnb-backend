@extends('layouts.app')

@section('title', 'Boolbnb - Le tue Statistiche')

@section('content')
    <div class="container">
        <h1 class="py-4">Statistiche degli Appartamenti</h1>
        <table class="table text-center w-100">
            <thead>
                <tr>
                    <th class="col-7">Appartamento</th>
                    <th>Totale Visite</th>
                    <th>Totale Messaggi</th>
                    <th>Statistiche</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                    <tr class="align-middle">
                        <td class="d-flex gap-3 align-items-center"><img
                                src="{{ asset('/storage' . '/' . $apartment->image) }}" alt="">{{ $apartment->title }}
                        </td>
                        <td>{{ $apartment->visits_count }}</td>
                        <td>{{ $apartment->messages_count }}</td>
                        <td>
                            <a href="{{ route('statistics.show', $apartment->id) }}" class="py-1 button_magenta">Apri</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style scoped>
    .button_magenta {
        background-color: #ff385c;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 5px;
        cursor: pointer;
        width: 35%;
        height: 55px;
    }

    img {
        width: 80px;
        max-height: 80px;
        border-radius: 5px
    }
</style>
