@extends('layouts.app')

@section('title', 'Boolbnb - I tuoi Messaggi')

@section('content')
    <div class="container">
        <h1 class="py-4">I tuoi messaggi</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row row-cols-1 row-cols-md-2">
            @foreach ($messages as $message)
                <div class="col my-4">
                    <div id="message_box" class="rounded py-3 px-4">
                        <div class="d-flex justify-content-between pt-3">
                            <div>
                                <span style="color: #e91e63;"><strong>{{ $message->name }}</strong> </span> -
                                <span>{{ $message->email }}</span>
                            </div>
                            <div>
                                <a href="{{ route('messages.show', [$message->apartment->slug, $message->id]) }}"
                                    class="me-2 text-decoration-none" style="color:rgba(42, 130, 212, 0.89)">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn p-0 text-decoration-none pb-1"
                                        style="background:none; border:none; color:#8f1505d0;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p>Ricevuto il <span class="fst-italic">{{ $message->created_at->format('d/m/Y') }}</span>, alle
                            <span class="fst-italic">{{ $message->created_at->format('H:i') }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<style>
    #message_box {
        border: 1px solid rgb(221, 221, 221);
        border-radius: 12px;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px;
    }
</style>
