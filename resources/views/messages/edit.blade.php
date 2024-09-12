@extends('layouts.app')

@section('content')
    <h1>Edit Message</h1>

    <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> You can edit the message by modifying the fields below.
    </div>

    <form action="{{ route('messages.update', $message->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $message->email }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $message->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="apartment_id">Apartment</label>
            <select name="apartment_id" class="form-control" required>
                @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}" @if ($apartment->id == $message->apartment_id) selected @endif>
                        {{ $apartment->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Message</button>
    </form>
@endsection
