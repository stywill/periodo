<?php


namespace App\Services;


use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nome,int $qtdTemporadas,int $epPorTemporada):Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome'=>$nome]);
        $this->criarTemporadas($qtdTemporadas, $serie, $epPorTemporada);
        DB::commit();
        return $serie;
    }
    /**
     * @param int $qtdTemporadas
     * @param $serie
     * @param int $epPorTemporada
     */
    private function criarTemporadas(int $qtdTemporadas, $serie, int $epPorTemporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodios($epPorTemporada, $temporada);
        }
    }
    /**
     * @param int $epPorTemporada
     * @param $temporada
     */
    private function criarEpisodios(int $epPorTemporada, $temporada): void
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
