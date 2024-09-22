@extends('layouts.app')

@section('title', 'Boolbnb - Modifica Appartamento')

@section('content')
    <div class="container">
        <h3 class="py-4">Modifica {{ $apartment->title }}</h3>

        <form action="{{ route('apartments.update', $apartment) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Modifica titolo -->
            <div class="form-group pb-4">
                <label for="title">
                    <h5>Titolo</h5>
                </label>
                <input type="text" name="title" id="title" class="form-control shadow_cards"
                    value="{{ $apartment->title }}" required>
            </div>

            <!-- Mostra ed elimina immagini esistenti -->

            <div class="row justify-content-between">
                {{-- BLOCCO IMMAGINE --}}
                <div class="col-12 col-md-5 mb-4 mb-md-0">
                    <h5>Immagine attuale</h5>
                    <img src="{{ asset('/storage' . '/' . $apartment->image) }}" alt="{{ $apartment->title }}"
                        class="img-fluid shadow_cards" style="width: 400px; height: 400px;">
                </div>

                {{-- BLOCCO IMMAGINE -> INDIRIZZO --}}
                <div class="col-12 col-md-7 py-2">
                    <!-- Modifica URL dell'immagine -->
                    <div class="form-group">
                        <label for="image_url">
                            <h5>NUOVA IMMAGINE: caricando un immagine la precedente verrà eliminata!</h5>
                        </label>
                        <input type="file" accept="image/jpeg, image/gif, image/png" name="image" id="image_url"
                            class="form-control shadow_cards" value="{{ $apartment->image }}">
                    </div>

                    <!-- Descrizione -->
                    <div class="pt-3 border-bottom">
                        <label for="description">
                            <h5>Descrizione</h5>
                        </label>
                        <textarea name="description" id="description" rows="5" class="form-control no-resize shadow_cards">{{ $apartment->description }}</textarea>
                    </div>

                    <!-- Indirizzo non modificabile -->
                    <div>
                        <label for="address" class="pt-3">
                            <h5>Indirizzo</h5>
                        </label>
                        <input type="text" name="address" id="address" class="form-control shadow_cards"
                            value="{{ $apartment->address }}" disabled>
                    </div>

                    <!-- Modifica visibilità -->
                    <div class="form-group pt-3">
                        <input type="checkbox" name="is_visible" id="is_visible" value="1"
                            @if ($apartment->is_visible) checked @endif>
                        <span class="form-check-label">Mostra l'appartamento</span>
                    </div>

                </div>

                <!-- BLOCCO Stanze, Bagni e Metri quadri -->
                <div class="col-12 col-md-6">
                    <div class="border text-center px-4 py-4 mt-4 shadow_cards">
                        <div class="pb-3">
                            <label for="rooms">
                                <h6>Stanze</h6>
                            </label>
                            <input type="number" name="rooms" id="rooms" class="form-control text-center"
                                value="{{ $apartment->rooms }}" required>
                        </div>
                        <div class="pb-3">
                            <label for="rooms">
                                <h6>Posti letto</h6>
                            </label>
                            <input type="number" name="beds" id="beds" class="form-control text-center"
                                value="{{ $apartment->beds }}" required>
                        </div>
                        <div class="pb-3">
                            <label for="bathrooms">
                                <h6>Bagni</h6>
                            </label>
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control text-center"
                                value="{{ $apartment->bathrooms }}" required>
                        </div>
                        <div>
                            <label for="square_meters">
                                <h6>Metri quadri</h6>
                            </label>
                            <input type="number" name="square_meters" id="square_meters" class="form-control text-center"
                                value="{{ $apartment->square_meters }}" required>
                        </div>
                    </div>
                </div>

                {{-- BLOCCO PREZZO --}}
                <div class="col-12 col-md-6">
                    <div class="border text-center px-4 py-3 mt-4 shadow_cards">
                        <!-- Modifica prezzo -->
                        <div class="apartment-price">
                            <label class="pb-4" for="price">
                                <h6>Prezzo a notte (€)</h6>
                            </label>
                            <input type="number" name="price" id="price" class="form-control text-center"
                                value="{{ $apartment->price }}" required>
                            <p class="py-3">Prezzo per 5 notti: <strong>{{ $apartment->price * 5 }} €</strong></p>
                            <p>Prezzo per una settimana: <strong>{{ $apartment->price * 7 }} €</strong></p>
                        </div>
                    </div>
                    <!-- Lista di servizi disponibili -->
                    <div>
                        <div class="form-group border-bottom">
                            <h5 class="pt-3 pb-1 text-center">Servizi disponibili</h5>
                            <ul class="d-flex flex-wrap justify-content-between pt-2 list-unstyled">
                                @foreach ($services as $service)
                                    <li class="col-4">
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                            @if (in_array($service->id, $apartment->services->pluck('id')->toArray())) checked @endif>
                                        <i class="{{ $service->icon_name }}"></i>
                                        {{ $service->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <div class="my-4 py-3 text-center">
                <button type="submit" class="button_magenta">Salva modifiche</button>
            </div>

        </form>
    </div>
@endsection

<style>
    .no-resize {
        resize: none;
    }

    .shadow_cards {
        border: 1px solid rgb(221, 221, 221);
        border-radius: 12px;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px;
    }

    .button_magenta {
        background-color: #e91e63;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 35%;
        height: 55px;
    }
</style>
