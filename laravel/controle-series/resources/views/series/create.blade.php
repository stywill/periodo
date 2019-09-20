@extends('layout');
@section('cabecalho')
Nova Série
@endsection
@section('conteudo')
    @include('erros',['errors'=>$errors])
    <form action="#" method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <div class="col col-2">
                <label for="qtd_temporadas">N° de temporadas</label>
                <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control">
            </div>
            <div class="col col-2">
                <label for="ep_por_temporadas">Ep. por temporadas</label>
                <input type="number" name="ep_por_temporadas" id="ep_por_temporadas" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
