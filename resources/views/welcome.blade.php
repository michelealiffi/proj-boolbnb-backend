@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5 text-center">

            <h1 class="display-5 fw-bold">
                Benvenuta nella tua pagina personale {{ Auth::user()->name }}
            </h1>

            <p class="col-8 fs-4 m-auto">
                Da qui {{ Auth::user()->name }} potrai creare il tuo primo appartamento o visualizzare quelli già creati.
                Grazie per averci scelti, il team di Boolbnb!
            </p>
        </div>
    </div>
@endsection
