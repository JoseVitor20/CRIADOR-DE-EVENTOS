@extends('layouts.main')

@section('title', 'Criar Evento')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3 mt-4">
    <h1>Crie o seu Evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data" class="mt-3">
        @CSRF

        <div class="form-group">
            <label for="title">Imagem do evento:</label>
            <br>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <br>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" />
        </div>
        <br>

        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" />
        </div>
        <br>

        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" />
        </div>
        <br>

        <div class="form-group">
            <label for="title">O evento é privado?:</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Qual a descrição do evento?" value=""></textarea>
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

        <input type="submit" class="btn btn-primary" value="Criar evento" />
        <br>
        <br>

    </form>
</div>

@endsection