@extends('layouts.app')

@section('title', 'Boolbnb - Modifica Appartamento')

@section('content')
    <div class="container">
        <h3 class="py-4">Modifica {{ $apartment->title }}</h3>

        <form action="{{ route('apartments.update', $apartment) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Modifica titolo -->
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $apartment->title }}"
                    required>
            </div>

            <!-- Mostra ed elimina immagini esistenti -->
            <div class="py-4">
                <h5>Immagini attuali</h5>
                <div class="d-flex flex-wrap">
                    <div class="position-relative m-2">
                        <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}" class="img-fluid"
                            style="width: 150px; height: 150px;">
                    </div>
                </div>
            </div>

            <!-- Modifica URL dell'immagine -->
            <div class="form-group">
                <label for="image_url">URL dell'immagine</label>
                <input type="text" name="image" id="image_url" class="form-control" value="{{ $apartment->image }}"
                    required>
            </div>

            <div class="row">
                <div class="col me-5">
                    <!-- Indirizzo non modificabile -->
                    <h5 class="pt-4">Indirizzo</h5>
                    <div class="border-bottom pb-4">
                        <input type="text" class="form-control" value="{{ $apartment->address }}" disabled>
                    </div>

                    <!-- Descrizione -->
                    <div class="pt-3 border-bottom">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" rows="5" class="form-control">{{ $apartment->description }}</textarea>
                    </div>

                    <!-- Stanze, Bagni e Metri quadri -->
                    <div class="pt-3">
                        <div class="border-bottom pb-4">
                            <label for="rooms">Stanze</label>
                            <input type="number" name="rooms" id="rooms" class="form-control"
                                value="{{ $apartment->rooms }}" required>
                        </div>
                        <div class="border-bottom pb-4">
                            <label for="bathrooms">Bagni</label>
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control"
                                value="{{ $apartment->bathrooms }}" required>
                        </div>
                        <div class="border-bottom pb-4">
                            <label for="square_meters">Metri quadri</label>
                            <input type="number" name="square_meters" id="square_meters" class="form-control"
                                value="{{ $apartment->square_meters }}" required>
                        </div>
                    </div>

                    <!-- Lista di servizi disponibili -->
                    <div class="form-group">
                        <h5>Servizi disponibili</h5>
                        <ul>
                            @foreach ($services as $service)
                                <li>
                                    <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                        @if (in_array($service->id, $apartment->services->pluck('id')->toArray())) checked @endif>
                                    <i class="{{ $service->icon_name }}"></i>
                                    {{ $service->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <div class="col-4">
                    <!-- Modifica prezzo -->
                    <div class="border rounded text-center px-4 py-4 mt-4">
                        <div class="apartment-price">
                            <label for="price">Prezzo a notte (€)</label>
                            <input type="number" name="price" id="price" class="form-control"
                                value="{{ $apartment->price }}" required>
                            <p>Prezzo per 5 notti: <strong>{{ $apartment->price * 5 }} €</strong></p>
                            <p>Prezzo per una settimana: <strong>{{ $apartment->price * 7 }} €</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modifica visibilità -->
            <div class="form-group">
                <label for="is_visible">Visibile</label>
                <input type="checkbox" name="is_visible" id="is_visible" value="1"
                    @if ($apartment->is_visible) checked @endif>
                <span class="form-check-label">Mostra l'appartamento</span>
            </div>




            <div class="my-4">
                <button type="submit" class="btn btn-primary">Salva modifiche</button>
            </div>
        </form>
    </div>
@endsection
