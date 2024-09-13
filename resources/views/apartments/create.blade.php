@extends('layouts.app')

@push('script')
    <!-- Usando Vite -->
    @vite(['resources/js/apartment/create.js'])
@endpush


@section('content')
    <div id="apartment_create">
        <section id="services">
            <form action="{{ route('apartments.store') }}" method="POST">
                @csrf
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
                                    value="1" onchange="changeSliderValue(this, 'value-of-range-3')" id="rooms"
                                    name="rooms">
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
                            <div class="mb-5">
                                <label for="square_meters" class="form-label fw-bold">Da quanti metri quadri è composto il
                                    tuo
                                    appartamento</label>
                                <input type="number" class="form-control text-center" id="square_meters"
                                    placeholder="metri quadrati..." name="square_meters">
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
                                <input list="datalistOptions" autocomplete="off" oninput="get_autocompleted_data()"
                                    type="text" class="form-control text-center" id="address"
                                    placeholder="via Giacomo Rotondo 12, Marte 01234">
                                <ul id="autocomplete_list">

                                </ul>
                            </div>

                        </div>
                    </div>

                    {{-- PAGINA 5 RISULTATO TOM TOM --}}
                    <div id="page-5" class="page row">
                        <div class="col">
                            <h2>A noi risulta che ti trovi qui, verifica che sia corretto!</h2>

                            {{-- SHOW INDIRIZZO --}}
                            <div class="mb-5">
                                <label for="result_address" class="form-label fw-bold">La tua via è:</label>
                                <h3 id="result_address_label">Caricamento, attendere prego...</h3>
                                <input type="hidden" id="result_address" name="address">
                                <input type="hidden" id="latitude" name="latitude">
                                <input type="hidden" id="longitude" name="longitude">
                            </div>
                        </div>
                    </div>

                    {{-- PAGINA 6 IMMAGINE --}}
                    <div id="page-6" class="page row">
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

                    {{-- PAGINA 7 SERVIZI --}}
                    <div id="page-7" class="page row">
                        <div class="col">
                            <h2>Indicaci i servizi a disposizione dei clienti</h2>
                            <ul>
                                <li>Servizio 1</li>
                            </ul>
                        </div>
                    </div>

                    {{-- PAGINA 8 PREZZO --}}
                    <div id="page-8" class="page row">
                        <div class="col">
                            <h2>Quanto pensi che valga la tua struttura</h2>

                            {{-- INPUT PREZZO --}}
                            <div class="mb-2">
                                <label for="rooms" class="form-label fw-bold">Nello scegliere il prezzo tieni conto
                                    delle strutture a te vicine, dei servizi che offri. Suggeriamo sempre di iniziare con un
                                    prezzo concorrenziale per permettere agli utenti di iniziare a conoscerti</label>
                                <div>
                                    <h4 class="d-inline" id="value-of-range-price">10</h4>
                                    <h4 class="d-inline">&euro;</h4>
                                </div>
                                <input type="range" class="form-range" min="10" max="1000" step="5"
                                    value="1" onchange="changeSliderValue(this, 'value-of-range-price')"
                                    id="rooms" name="price">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-full  progress-block">
                    <div class="row">
                        <div class="col-2 text-center">
                            <button id="button-backward" class="btn btn-secondary">Indietro</button>
                        </div>
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
