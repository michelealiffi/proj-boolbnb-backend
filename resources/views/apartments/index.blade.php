@extends('layouts.app')

@section('title', 'Boolbnb')

@section('content')
    <div class="container" id="index_page">
        <h1 class="my-4 text-center text-md-start">La tua area</h1>

        <div class="gap-4">
            {{-- Bottone per creare un nuovo appartamento --}}
            <a href="{{ route('apartments.create') }}"
                class="btn btn-outline mb-4 d-flex justify-content-center justify-content-md-start">
                <div class="transition_icon transition" style="transition: transform 0.1s;">
                    <i class="fa-solid fa-home" style="color: #FF385C;"></i>
                    <i class="fa-solid fa-plus fa-xs position-relative " style="top: -10px; left: -5px; color: #FF385C"></i>
                    <span>Aggiungi un appartamento</span>
                </div>
            </a>
        </div>

        {{-- Verifica se ci sono appartamenti --}}
        @if ($apartments->count() > 0)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 gx-4 gy-5">
                @foreach ($apartments as $apartment)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 h-100">
                            <div class="card-img-container">

                                {{-- Immagine dell'Appartamento --}}
                                <img src="https://i.redd.it/zvo9zlpf3dk71.jpg" class="card-img-top rounded" alt="...">
                                <img src="{{ asset('/storage' . '/' . $apartment->image) }}"
                                    class="card-img-top rounded apartment-img" onerror="this.style.display='none'"
                                    alt="{{ $apartment->title }}">

                            </div>
                            {{-- Titolo e Prezzo dell'Appartamento --}}
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div class="fw-medium">{{ $apartment->title }}</div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span>{{ $apartment->address }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex gap-1">
                                            <span class="fw-medium">{{ $apartment->price }} &euro;</span><span>a
                                                notte</span>
                                        </div>

                                        <div>
                                            <a href="{{ route('messages.index', $apartment->slug) }}"
                                                class="me-2 text-decoration-none" style="color:rgba(219, 25, 25, 0.877)">
                                                <i class="fa-solid fa-envelope"></i>
                                            </a>

                                            {{-- Icona per visualizzare l'appartamento --}}
                                            <a href="{{ route('apartments.show', $apartment->slug) }}"
                                                class="me-2 text-decoration-none" style="color:rgba(42, 130, 212, 0.89)">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            {{-- Icona per modificare l'appartamento --}}
                                            <a href="{{ route('apartments.edit', $apartment) }}"
                                                class="me-2 text-decoration-none" style="color:rgba(76, 138, 76, 0.877)">
                                                <i class="fa-solid fa-pencil-alt"></i>
                                            </a>


                                            <button type="submit" class="p-0 text-decoration-none"
                                                style="background:none; border:none; color:#8f1505d0;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteApartment-{{ $apartment->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- MODAL CONFIRM DELETE --}}
                    <div class="modal fade" id="confirmDeleteApartment-{{ $apartment->id }}" tabindex="-1"
                        aria-labelledby="MessageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-body text-center" v-show="response_message.show">
                                    <h5>Sei sicuro di voler <b class="text-danger d-block">CANCELLARE
                                            DEFINITIVAMENTE</b>
                                        l'appartamento:
                                    </h5>
                                    <h5><u>{{ $apartment->title }}</u></h5>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                    <form action="{{ route('apartments.destroy', $apartment) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END MODAL CONFIRM DELETE --}}
                @endforeach
            </div>
        @else
            <p>Non hai inserito ancora nessun appartamento. Comincia ora!</p>
        @endif



    </div>
@endsection
