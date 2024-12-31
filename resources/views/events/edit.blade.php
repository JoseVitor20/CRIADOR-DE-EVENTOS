@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3 mt-4">
    <h1>Editando: {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data" class="mt-3">
        @CSRF
        @method('PUT')

        <div class="form-group">
            <label for="title">Imagem do evento:</label>
            <br>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/events/{{$event->image}}" alt={{$event->title}} class="img-preview"/>
        </div>
        <br>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{$event->title}}" />
        </div>
        <br>

        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}">
        </div>
        <br>

        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{$event->city}}" />
        </div>
        <br>

        <div class="form-group">
            <label for="title">O evento é privado?:</label>
            <select name="private" id="private" class="form-control" value="{{$event->private}}">
                <option value="0">Não</option>
                <option value="1" {{($event->private) ? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control">{{$event->description}}</textarea>
        </div>
        <br>

        <div class="form-group">
            <label for="description">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <label for="Cadeiras">Cadeiras</label>
                <input id="Cadeiras" type="checkbox" name="items[]" value="Cadeiras" />
            </div>
            <div class="form-group">
                <label for="Palco">Palco</label>
                <input id="Palco" type="checkbox" name="items[]" value="Palco" />
            </div>
            <div class="form-group">
                <label for="Cerveja grátis">Cerveja grátis</label>
                <input id="Cerveja grátis" type="checkbox" name="items[]" value="Cerveja grátis" />
            </div>
            <div class="form-group">
                <label for="Open Food">Open Food</label>
                <input id="Open Food" type="checkbox" name="items[]" value="Open Food" />
            </div>
            <div class="form-group">
                <label for="Brindes">Brindes</label>
                <input id="Brindes" type="checkbox" name="items[]" value="Brindes" />
            </div>
        </div>
        <br>

        <input type="submit" class="btn btn-primary" value="Editar evento" />
        <br>
        <br>

    </form>
</div>

@endsection