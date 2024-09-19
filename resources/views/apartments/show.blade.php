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

        <div class="d-flex">
            <div id="img_section">
                <img src="{{ $apartment->image }}" alt="{{ $apartment->title }}" class="img-fluid rounded" style="width:600px">
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
