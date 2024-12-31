@extends('layouts.main')
@section('title', $event->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img class="img-fluid" src="/img/events/{{$event->image}}" alt={{$event->title}} title={{$event->title}}>
        </div>
        
        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city"><i class="fa-solid fa-location-dot"></i><strong class="pe-2">Local:</strong>{{$event->city}}</p>
            <p class="event-date"><i class="fa-solid fa-calendar-days"></i><strong class="pe-2">Data prevista:</strong>{{date('d/m/Y', strtotime($event->date))}}</p>
            <p class="events-participants"><i class="fa-solid fa-users"></i><strong class="pe-2">Nº de participantes:</strong>{{count($event->users)}}</p>
            <p class="events-participants">
                @if($event->private)
                    <i class="fa-regular fa-hand"></i><strong class="pe-2">O evento é:</strong> Privado
                @else
                <i class="fa-solid fa-door-open"></i><strong class="pe-2">O evento é:</strong> Público
                @endif
            </p>

            <p class="event-owner"><i class="fa-solid fa-id-card-clip"></i><strong class="pe-2">Dono do evento: </strong>{{$eventOwner['name']}}</p>

            @if(!$hasUserJoined)
                <form action="/events/join/{{$event->id}}" method="POST">
                    @csrf
                    <a href="/events/join/{{$event->id}}"
                        class="btn btn-primary" 
                        id="event-submit"
                        onclick="event.preventDefault(); this.closest('form').submit()" 
                    >
                    <i class="fa-solid fa-user-plus"></i> Confirmar presença
                    </a>
                </form>
            @else
                <p class="btn btn-success text-white w-50 already-joined-msg"><strong><i class="fa-solid fa-user-check"></i> Sua presença já está confirmada!</strong></p>
            @endif

            <br><br>
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($event->items as $item)
                <li><i class="fa-solid fa-caret-right"></i>{{$item}}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-12" id="description-container">
            <h3>Sobre o Evento:</h3>
            <p class="event-description">{{$event->description}}</p>
        </div>
    </div>
</div>

@endsection