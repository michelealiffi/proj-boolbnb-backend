@extends('layouts.app')

@section('title', 'Boolbnb - Il tuo Appartamento')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="py-4">{{ $apartment->title }}</h3>

        {{-- Box Messaggi --}}
        <a href="{{ route('messages.index', $apartment->slug) }}"
            class="alert-link d-flex align-items-center text-decoration-none">
            <div class="btn-outline btn mb-4">
                <i class="fa-solid fa-envelope transition transition_icon"
                    style="transition: transform 0.1s; color: #FF385C"></i>
                <span>I tuoi messaggiiiii</span>
            </div>
            {{ session('message') }}

            @if (session('unread_messages_count') > 0)
                <span class="position-absolute top-20 start-75 translate-middle badge rounded-pill bg-danger">
                    {{ session('unread_messages_count') }}
                    <span class="visually-hidden">unread messages</span>
                </span>
            @endif
        </a>

        <div class="d-flex">
            <div id="img_section">
                <img src="{{ asset('/storage' . '/' . $apartment->image) }}" alt="{{ $apartment->title }}"
                    class="img-fluid rounded" style="width:600px">
            </div>

            <div id="apt_details" class="col ms-5 px-3 me-5">
                <h5 class="pt-4">{{ $apartment->address }}</h5>
                <div class="border-bottom pb-4">
                    <span>{{ $apartment->rooms }} stanz{{ $apartment->rooms > 1 ? 'e' : 'a' }} &middot;</span>
                    <span>{{ $apartment->beds }} lett{{ $apartment->beds > 1 ? 'i' : 'o' }} &middot;</span>
                    <span>{{ $apartment->bathrooms }} bagn{{ $apartment->bathrooms > 1 ? 'i' : 'o' }} &middot; </span>
                    <span>{{ $apartment->square_meters }} m²</span>
                </div>

                <div class="border-bottom pt-3">
                    <p>Inserito da: <strong>{{ $apartment->user->name }}</strong></p>
                </div>

                <div class="pt-3 border-bottom">
                    <p>{{ $apartment->description }}</p>
                </div>

                <div class="py-4">
                    <h5>Cosa troverai</h5>
                    <ul class="d-flex flex-wrap pt-3">
                        @foreach ($apartment->services as $service)
                            <li class="col-6"><i class="{{ $service->icon_name }}"></i> {{ $service->name }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

<style>
    #apt_details {
        border: 1px solid rgb(221, 221, 221);
        border-radius: 12px;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px;
    }
</style>
