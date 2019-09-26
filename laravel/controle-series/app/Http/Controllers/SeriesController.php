<?php


namespace App\Http\Controllers;


use App\Episodio;
use App\Http\Requests\SeresFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = Serie::query()
            ->orderBy('nome')->paginate($request->per_page);
        $mensagem = $request->session()->get('mensagem');
        $paginas = round($series->total()/$series->perPage());
        return view("series.index",['series'=>$series,'paginas'=>$paginas,'mensagem'=>$mensagem]);
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(SeresFormRequest $request, CriadorDeSerie $criarSerie)
    {
       $request->rules();
       $serie = $criarSerie->criarSerie($request->nome, $request->qtd_temporadas,$request->ep_por_temporadas);
       $request->session()->flash('mensagem', "Série {$serie->id} e duas temporadas e episódios criados com sucesso {$serie->nome}");
       return redirect()->route('listar_series',['page'=>1,'per_page'=>3]);
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removeSerie($request->id);
        $request->session()->flash('mensagem', "Serie {$nomeSerie} removida com sucesso!!");
        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $nome = $request->nome;
        /**
         * @var Serie $serie
         */
        $serie = Serie::find($id);
        $serie->nome = $nome;
        $serie->save();
    }
}
