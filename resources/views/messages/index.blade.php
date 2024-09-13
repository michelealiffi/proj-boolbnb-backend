@extends('layouts.app')

@section('title', 'Boolbnb - I tuoi Messaggi')

@section('content')
    <div class="container">
        <h1 class="my-2">Messages</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->email }}</td>
                        <td>
                            <a href="{{ route('messages.show', $message->id) }}" class="btn btn-info">View</a>
                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
