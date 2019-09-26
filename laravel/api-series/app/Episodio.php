<?php


namespace App;


use foo\bar;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps=false;
    protected $fillable=['temporada','numero','assistido','serie_id'];
    protected $appends=['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido):bool
    {
        return $assistido;
    }

    public function getLinksAttribute($links):array
    {
        return [
            "selef"=>"/api/episodios/{$this->id}",
            "serie"=>"/api/series/{$this->serie_id}"
        ];
    }

/*
    public function getNumeroAttribute(int $numero):string
    {
        return "#".$numero;
    }
*/
}
