@extends('layouts.app')

@section('title', 'Boolbnb')

@section('content')
    <div class="container">
        <h1 class="my-4">List of Apartments</h1>

        <div class="justify-content-between d-flex">

            {{-- Bottone per creare un nuovo appartamento --}}
            <a href="{{ route('apartments.create') }}" class="btn btn-primary mb-4">Create New Apartment</a>

            {{-- Box Messaggi --}}
            <a href="{{ route('messages.index') }}" class="alert-link">
                <i class="fa-solid fa-envelope fa-2xl"></i>{{ session('message') }}
                @if (session('unread_messages_count') > 0)
                    <span class="position-absolute top-20 start-75 translate-middle badge rounded-pill bg-danger">
                        {{ session('unread_messages_count') }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                @endif
            </a>

        </div>

        {{-- Verifica se ci sono appartamenti --}}
        @if ($apartments->count() > 0)
            <div class="row">
                @foreach ($apartments as $apartment)
                    <div class="col-md-4 mb-4">
                        <div class="card-group p-3 border border-2 rounded-2">
                            <div class="card-body">

                                {{-- Immagine dell'Appartamento --}}
                                {{-- <img src="{{ asset('storage/' . $apartment->image) }}" class="card-img-top"
                                    alt="{{ $apartment->title }}"> --}}
                                <img src="{{ $apartment->image }}" class="card-img-top img-mod rounded-2"
                                    alt="{{ $apartment->title }}">

                                {{-- Titolo e Prezzo dell'Appartamento --}}
                                <h5 class="card-title mt-1 text-truncate">{{ $apartment->title }}</h5>
                                <p class="card-text mt-1">Price: ${{ $apartment->price }}</p>

                                <div class="justify-content-between d-flex">
                                    <div>
                                        {{-- Link per visualizzare l'appartamento --}}
                                        <a href="{{ route('apartments.show', $apartment->slug) }}"
                                            class="btn btn-info">View</a>

                                        {{-- Link per modificare l'appartamento --}}
                                        <a href="{{ route('apartments.edit', $apartment) }}"
                                            class="btn btn-warning">Edit</a>

                                        {{-- Form per eliminare l'appartamento --}}
                                        <form action="{{ route('apartments.destroy', $apartment) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>

                                    <div>
                                        {{-- Link per le statistiche dell'appartamento --}}
                                        <a href="#" class="btn btn-secondary justify-items-md-end"
                                            id="btnGroupAddon2">Statistics</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No apartments found.</p>
        @endif
    </div>
@endsection
