@extends('layout')
@section('cabecalho')
    Episódios
@endsection
@section('conteudo')
    @include('menssagens',['menssagem'=>$mensagem])
    <form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{$episodio->numero}}
                    <input type="checkbox" name="episodios[]" value="{{$episodio->id}}" {{$episodio->assistido ? 'checked': ''}}>
                </li>
            @endforeach
        </ul>
        @auth
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
        @endauth
    </form>
@endsection
