@extends('layouts.app')

@section('title', 'Boolbnb - Messaggio')

@section('content')
    <div class="container py-4">

        <div id="message_box" class="rounded py-4 px-3">
            <div class="pb-3">
                <h4>Messaggio da: <span id="sender" class="fst-italic">{{ $message->name }}</span> </h4>
                <h5>{{ $message->email }}</h5>
            </div>
            <div>
                "<span class="fst-italic">{{ $message->content }}</span>"
            </div>
            <div class="pt-3">
                <span><strong>Riferito a: </strong>{{ $message->apartment->title }}</span>
            </div>
        </div>

        <form class="mt-4" action="{{ route('messages.destroy', $message->id) }}" method="POST"
            style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="button_magenta">Delete Message</button>
        </form>
    </div>
@endsection

<style scoped>
    #message_box {
        border: 1px solid rgb(221, 221, 221);
        border-radius: 12px;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 6px 16px;
    }

    #sender { 
        color: #e91e63
    }

    .button_magenta {
        background-color: #e91e63;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 50px
        height: 55px;
    }
</style>
