@extends('layouts.app')

@push('script')
    <!-- Usando Vite -->
    @vite(['resources/js/apartment/create.js'])
@endpush


@section('content')
    <div id="apartment_create">
        <section id="services">
            <form action="{{ route('apartments.store') }}" method="POST">
                <div class="container-sm main-block text-center py-5 overflow-y-auto">
                    {{-- PAGINA 1 PREVIEW --}}
                    <div id="page-1" class="page row row-cols-2">
                        <div class="col">
                            <h2>Creeremo il tuo appartamento</h2>
                            <p>Durante la fase di creazione ti dovremo fare alcune domande per capire che tipo di
                                appartamento possiedi, quali servizi offre, aggiungere qualche foto e dirci a quanto
                                vuoi affittare.</p>
                        </div>
                        <div class="col">
                            <video width="600" autoplay preload="auto">
                                <source src="{{ asset('videos/create_page_1.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>

                    {{-- PAGINA 2 TITOLO E DESCRIZIONE --}}
                    <div id="page-2" class="page row">
                        <div class="col">
                            <h2>Dai un titolo e una descrizione al tuo appartamento</h2>

                            {{-- INPUT TITOLO --}}
                            <div class="mb-5">
                                <label for="title" class="form-label fw-bold">Dai un titolo al tuo
                                    appartamento.
                                    Ricorda... titoli brevi sono di maggior effetto.</label>
                                <input type="text" class="form-control text-center" id="title"
                                    placeholder="Il tuo magnifico titolo!" name="title">
                            </div>

                            {{-- INPUT DESCRIZIONE --}}
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Descrivi il tuo
                                    appartamento, fai in modo che ci siano tutte le informazioni di cui un ospite potrebbe
                                    aver bisogno. Questo migliorerà sia l'esperienza che il numero di prenotazioni.</label>
                                <textarea class="form-control text-center" id="description" name="description">Curato appartamento nei pressi di...</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- PAGINA 3 DIMENSIONI E NUMERI --}}
                    <div id="page-3" class="page row">
                        <div class="col">
                            <h2>Ora dacci qualche dato in più per poterti aiutare ad iniziare</h2>

                            {{-- INPUT STANZE --}}
                            <div class="mb-2">
                                <label for="rooms" class="form-label fw-bold">Quante stanze da letto ha
                                    il tuo
                                    appartamento?</label>
                                <h4 id="value-of-range-3">1</h4>
                                <input type="range" class="form-range" min="1" max="10" step="1"
                                    value="1" onchange="changeSliderValue(this, 'value-of-range-3')" id="rooms">
                            </div>

                            {{-- INPUT BAGNI --}}
                            <div class="mb-2">
                                <label for="bathrooms" class="form-label fw-bold">Quanti bagni ha
                                    il tuo appartamento?</label>
                                <h4 id="value-of-range-bathrooms">1</h4>
                                <input type="range" class="form-range" min="1" max="6" step="1"
                                    value="1" onchange="changeSliderValue(this, 'value-of-range-bathrooms')"
                                    id="bathrooms" name="bathrooms">
                            </div>

                            {{-- INPUT METRI QUADRATI --}}
                            <div class="mb-2">
                                <label for="squared-meters" class="form-label fw-bold">Da quanti metri quadrati è composto
                                    il tuo appartamento?</label>
                                <div>
                                    <h4 class="d-inline" id="value-of-range-sm">10</h4>
                                    <h4 class="d-inline">metri quadrati</h4>

                                </div>
                                <input type="range" class="form-range" min="10" max="255" step="1"
                                    value="1" onchange="changeSliderValue(this, 'value-of-range-sm')"
                                    id="squared-meters" name="squared_meters">
                            </div>
                        </div>
                    </div>

                    {{-- PAGINA 4 INDIRIZZO E TOMTOM --}}
                    <div id="page-4" class="page row">
                        <div class="col">
                            <h2>Dicci dove ti trovi!</h2>

                            {{-- INPUT INDIRIZZO --}}
                            <div class="mb-5">
                                <label for="address" class="form-label fw-bold">Inserisci via, città e cap del tuo
                                    appartamento</label>
                                <input type="text" class="form-control text-center" id="address"
                                    placeholder="via Giacomo Rotondo 12, Marte 01234" name="address">
                            </div>

                        </div>
                    </div>

                    {{-- PAGINA 5 IMMAGINE --}}
                    <div id="page-5" class="page row">
                        <div class="col">
                            <h2>Facci vedere il tuo lato migliore</h2>

                            {{-- INPUT IMMAGINE --}}
                            <div class="mb-5">
                                <label for="image" class="form-label fw-bold">Carica una foto che rappresenti al meglio
                                    il tuo appartamento. La qualità dell'immagine influisce moltissimo sulla possibilità di
                                    attirare più clienti</label>
                                <input type="text" class="form-control text-center" id="image"
                                    placeholder="http://sito-di-immagini/la-mia-immagine.jpeg" name="image">
                            </div>

                        </div>
                    </div>

                    {{-- PAGINA 6 SERVIZI --}}
                    <div id="page-6" class="page row">
                        <div class="col">
                            <h2>Facci vedere il tuo lato migliore</h2>



                        </div>
                    </div>

                </div>

                <div class="container-full  progress-block">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8"></div>
                        <div class="col-2">
                            <button id="button-forward" class="btn btn-primary">Procedi</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
