@extends('layouts.app')


@section('title', 'Boolbnb')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 py-4 text-center">
                <h1 class="display-2">INIZIA A FARTI CONOSCERE</h1>
            </div>
            <div class="col-12 mb-4 text-center">
                <h2 class="display-6">
                    Non limitare il tuo potenziale, inizia a guadagnare come un vero professionista!
                </h2>
            </div>
        </div>
        <div class="row row-cols-3 g-3">
            @foreach ($sponsors as $sponsor)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header text-center">
                            <h4 class="card-title">{{ $sponsor->title }}</h4>
                        </div>
                        <div class="card-body">
                            <p>Per ogni ora di sponsorizzazione {{ $persons_per_hour }} nuovi utenti vedranno il tuo
                                annuncio</p>

                            <p class="fw-bold">Sblocca il vero potenziale del tuo appartamento per {{ $sponsor->duration }}
                                ore!</p>

                            <p>Inizia <strong>subito</strong> e già nelle prossime <strong>{{ $sponsor->duration }}
                                    ore</strong> conoscerai fino a
                                <strong>{{ $persons_per_hour * $sponsor->duration }}</strong> nuovi clienti
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary w-100">Incominciamo a farci conoscere!</button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12">

            </div>
        </div>
    </div>
@endsection
