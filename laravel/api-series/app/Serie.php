<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps=false;
    protected $fillable=['nome'];
    protected $perPage=3;
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function setNomeAttribute(string $nome):void
    {
       $this->attributes['nome'] = mb_convert_case($nome,MB_CASE_TITLE);
    }

    public function getLinksAttribute($link):array
    {
        $episodios = Episodio::query()->where('serie_id',$this->id)->count();
        if($episodios>0){
            $episodiosLink = "/api/series/{$this->id}/episodios";
        }else{
            $episodiosLink ="";
        }
        return [
            "self"=>"/api/series/{$this->id}",
            "episodios"=>$episodiosLink
        ];
    }
}
