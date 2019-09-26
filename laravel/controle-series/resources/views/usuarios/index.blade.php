@extends('layout')
@section('cabecalho')
    Usuários
@endsection
@section('conteudo')
    @include('menssagens',['menssagem'=>$mensagem])
    @auth
        <a href="/registrar" class="btn btn-dark mb-2">Adicionar</a>
    @endauth
    <ul class="list-group">
        @foreach ($usuarios as $usuario)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="nome-serie-{{ $usuario->id }}">{{ $usuario->name }}</span>
                @auth
                    <div class="input-group w-50" hidden id="input-nome-serie-{{ $usuario->id }}">
                        <input type="text" class="form-control" value="{{ $usuario->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarSerie({{ $usuario->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>
                @endauth
                <span class="d-flex">
                    @auth
                        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $usuario->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    @endauth
                    <a href="/usuarios/{{$usuario->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                     @auth
                        <form method="post" action="/usuarios/{{$usuario->id}}" onsubmit="return confirm('Deseja excluir a série: {{addslashes($usuario->name)}}')">
                        @csrf
                            @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                    @endauth
                </span>
            </li>
        @endforeach
    </ul>
    <script>
        function toggleInput(serieId) {
            const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
            if (nomeSerieEl.hasAttribute('hidden')) {
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }
        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-nome-serie-${serieId} > input`)
                .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/series/${serieId}/editaNome`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            });
        }
    </script>

@endsection
