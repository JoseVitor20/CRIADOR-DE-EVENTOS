@extends('layouts.main')

@section('title', 'Página Principal')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control w-25" placeholder="Procurar..." />
    </form>
</div>
<div class="col-md-12" id="events-container">
    @if($search)
        <h1>Resualtado da busca: {{$search}}</h1>
        <a href="/">Ver outros eventos disponíveis!</a>
        <br>
        <br>
    @else
        <h1>Próximos eventos:</h1>
        <p class="subitle">Veja os eventos dos próximos dias...</p>
    @endif

    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="card col-md-3">
                <img height="200" src="/img/events/{{$event->image}}" alt="{{$event->title}}" title="{{$event->title}}" />
                <div class="card-body">
                    <div class="card-date">{{date('d/m/Y', strtotime($event->date))}}</div>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participantes">{{count($event->users)}} Participantes</p>
                    <a href="events/{{$event->id}}" class="btn btn-primary">Saiba mais</a>
                </div>
            </div>
        @endforeach

        @if(count($events) == 0 && $search)
            <h3>Evento não encontrado...</h3>
            <a href="/">Veja os eventos disponíveis!</a>

        @elseif(count($events) == 0)
            <h3>Não há eventos no momento!</h3>
        @endif

    </div>
</div>

@endsection