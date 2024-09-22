@extends('layouts.app')


@section('title', 'Boolbnb')

@push('script')
    <!-- Usando Vite -->
    @vite(['resources/js/sponsors/main.js'])
@endpush

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
        <div class="row row-cols-1 row-cols-md-3     g-3">
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
                            <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#modal-sponsor-{{ $sponsor->id }}">Inizia con soli
                                {{ $sponsor->price }}&euro;</button>
                        </div>
                    </div>
                </div>


                {{-- MODALE --}}
                <div class="modal" tabindex="-1" id="modal-sponsor-{{ $sponsor->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase">PIANO {{ $sponsor->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Stai sottoscrivendo il piano {{ $sponsor->title }} che ti darà accesso a tutti i vantaggi
                                    della sposnorizzazione per l'appartamento di tua scelta. La durata della
                                    sponsorizzazione scelta è di {{ $sponsor->duration }} ore al prezzo di
                                    {{ $sponsor->price }}&euro;. Premendo su sottoscrivi dichiari di aver letto e accettato
                                    la policy di boolbnb.</p>

                                <form class="form" method="POST" action="{{ route('sponsor.store') }}">
                                    @csrf
                                    <input type="hidden" name="sponsor_id" value="{{ $sponsor->id }}">
                                    <select class="form-select" name="apartment_id" id="apartmentSelect">
                                        <option value="">Seleziona l'appartamento da sponsorizzare</option>
                                        @foreach ($apartments as $apartment)
                                            <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                                        @endforeach
                                    </select>
                                </form>
                                <div>
                                    <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.js"></script>

                                    <div id="dropin-container"></div>
                                </div>

                                <!-- Sezione di successo nascosta inizialmente -->
                                <div id="success-message" style="display: none;">
                                    <h4>Pagamento avvenuto con successo!</h4>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <button type="button" class="btn btn-primary" id="submit-button">Sottoscrivi</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
