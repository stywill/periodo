<?php


namespace App\Services;


use App\{Episodio, Serie, Temporada};
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removeSerie(int $serieId): String
    {
        $nomeSerie='';
        DB::transaction(function () use($serieId,&$nomeSerie){
            $serie = Serie::find($serieId);
            $this->removeTemporadas($serie);
            $serie->delete();
            $nomeSerie = $serie->nome;
        });
        return $nomeSerie;
    }
    /**
     * @param $serie
     */
    private function removeTemporadas($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removeEpisodios($temporada);
            $temporada->delete();
        });
    }
    /**
     * @param Temporada $temporada
     */
   private function removeEpisodios(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
