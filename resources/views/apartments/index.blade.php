@extends('layouts.app')

@section('content')
    <h1>List of Apartments</h1>
    <a href="{{ route('apartments.create') }}">Create New Apartment</a>
    <ul>
        @foreach ($apartments as $apartment)
            <li>{{ $apartment->title }} - ${{ $apartment->price }}
                <a href="{{ route('apartments.show', $apartment->slug) }}">{{ $apartment->title }}</a>
                <a href="{{ route('apartments.edit', $apartment) }}">Edit</a>
                <form action="{{ route('apartments.destroy', $apartment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
