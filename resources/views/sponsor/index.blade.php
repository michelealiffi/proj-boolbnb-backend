@extends('layouts.app')


@section('title', 'Boolbnb')

@section('content')
    <div class="container-sm">
        <h1 class="text-center mb-5 pt-5 text-uppercase display-4">Sponsorizzazioni Acuqistate</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <ul class="list-group ms-auto me-auto mb-5">
            @foreach ($sponsorships as $sponsorship)
                <li class="list-group-item">
                    <h4>
                        {{ $sponsorship->apartment_title }} - <u class="text-uppercase">{{ $sponsorship->sponsor_title }}</u>
                    </h4>
                    <div class="d-flex justify-content-between">
                        <div>
                            <span><b>Da:</b> {{ $sponsorship->start_time }}</span>
                            <span><b class="ms-3">A:</b> {{ $sponsorship->end_time }}</span>
                        </div>
                        <div>
                            Pagato: <h5 class="d-inline">{{ $sponsorship->price }}</h5>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
