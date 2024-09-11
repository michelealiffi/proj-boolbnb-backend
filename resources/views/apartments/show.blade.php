@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3 class="py-4">{{ $apartment->title }}</h3>

    <div class="">
        <img src="{{ $apartment->image}}" alt="{{ $apartment->title }}" class="img-fluid rounded-start" style="width:600px">
    </div>

    <div class="row">
        <div class="col me-5">
            <h5 class="pt-4">{{ $apartment->address }}</h5>
            <div class="border-bottom pb-4">
                <span>{{ $apartment->rooms }} stanza/e &middot;</span>
                <span>{{ $apartment->bathrooms }} bagno/i &middot; </span>
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
                        <li class="col-6"><i class="{{$service->icon_name}}"></i> {{ $service->name }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
      
        <div class="col-4">
            <div class="border rounded text-center px-4 py-4 mt-4">
                <div class="apartment-price">
                    <p><strong>{{ $apartment->price }} €</strong> notte</p>
                    <p>Prezzo per 5 notti: <strong>{{ $apartment->price * 5 }}€</strong></p>
                    <p>Prezzo per una settimana: <strong>{{ $apartment->price * 7 }}€</strong></p>
                </div>
                <div>
                    <p>Hai qualche domanda o vuoi prenotare? Contatta l'host! <i class="fa-solid fa-arrow-down-long fa-sm"></i></p>
                    <button class="btn btn-secondary">Contatta</button>
                    <p class="pt-4">Non riceverai alcun addebito in questa fase</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>
@endsection

