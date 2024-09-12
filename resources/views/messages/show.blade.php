@extends('layouts.app')

@section('content')
    <h1>Message Details</h1>

    <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> You are viewing the details of this message.
    </div>

    <div class="card">
        <div class="card-header">
            <h3>{{ $message->email }}</h3>
        </div>
        <div class="card-body">
            <p>{{ $message->content }}</p>
        </div>
        <div class="card-footer">
            <strong>Apartment: </strong>{{ $message->apartment->title }}
        </div>
    </div>

    <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-warning">Edit Message</a>
    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Message</button>
    </form>
@endsection
