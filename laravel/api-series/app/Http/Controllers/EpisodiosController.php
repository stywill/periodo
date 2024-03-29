<?php


namespace App\Http\Controllers;


use App\Episodio;
use http\Env\Request;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function buscaPorSerie(int $serieId)
    {
        $episodios = Episodio::query()->where('serie_id',$serieId)->get();
        return $episodios;
    }
}
