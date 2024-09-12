@extends('layouts.app')

@section('content')
    <h1>Create New Message</h1>

    <div class="alert alert-info">
        <i class="fa fa-info-circle"></i> You can create a new message by filling out the form below.
    </div>

    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="apartment_id">Apartment</label>
            <select name="apartment_id" class="form-control" required>
                @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create Message</button>
    </form>
@endsection
