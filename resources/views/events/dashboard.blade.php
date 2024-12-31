@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scope="row">{{$loop->index + 1}}</td>
                        <td><a href="events/{{$event->id}}">{{$event->title}}</a></td>
                        <td>{{count($event->users)}}</td>
                        <td>
                            <a class="btn btn-info" href="events/edit/{{$event->id}}"><i class="fa-solid fa-pencil"></i> Editar</a>
                            <form action="events/{{$event->id}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-regular fa-trash-can"></i> Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Você ainda não possui evento. </h3>
        <a href="events/create"><i class="fa-solid fa-calendar-plus"></i> Criar novo evento</a>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
    @if(count($eventsAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventsAsParticipant as $event)
                    <tr>
                        <td scope="row">{{$loop->index + 1}}</td>
                        <td><a href="events/{{$event->id}}">{{$event->title}}</a></td>
                        <td>{{count($event->users)}}</td>
                        <td>
                            <form action="events/leave/{{$event->id}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-regular fa-trash-can"></i> Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você não possuí nenhum evento...</p>
        <a href="">Veja todos os eventos e participe!</a>
    @endif
</div>

@endsection