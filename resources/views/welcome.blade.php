@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5 text-center">

            <h1 class="display-5 fw-bold">
                Benvenuta nella tua pagina personale {{ Auth::user()->name }}
            </h1>

            <p class="col-8 fs-4 ms-auto me-auto mb-5">
                Da qui {{ Auth::user()->name }} potrai creare il tuo primo appartamento o visualizzare quelli già creati.
                Grazie per averci scelti, il team di Boolbnb!
            </p>
            <div>
                @if (count(Auth::user()->apartments) === 0)
                    {{-- utente loggato senza appartamenti --}}
                    <a href="{{ route('apartments.create') }}" class="btn btn-primary">Crea il tuo primo appartamento</a>
                @else
                    {{-- utente loggato con appartamenti --}}
                    <a href="{{ route('apartments.create') }}" class="btn btn-primary">Crea un'altro appartamento</a>
                @endif
            </div>
        </div>
    </div>
@endsection
