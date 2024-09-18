@extends('layouts.app')


@section('title', 'Boolbnb')

@section('content')
    @foreach ($sponsors as $sponsor)
        {{ $sponsor }}
    @endforeach
@endsection
