<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class BaseController
{
    protected $classe;
    public function index(Request $request)
    {
            return $this->classe::paginate($request->per_page);
    }

    public function store(Request $request)
    {
       return response()->json( $this->classe::create($request->all()),201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        if(is_null($recurso)){
            return response()->json('',204);
        }
        return response()->json($recurso,201);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if(is_null($recurso)){
            return response()->json(["erro"=>"Recurso não encontrado"],404);
        }
        $recurso->fill($request->all());
        $recurso->save();
        return response()->json($recurso,201);
    }

    public function destroy(int $id)
    {
        $quantidadeRecursos = $this->classe::destroy($id);
        if($quantidadeRecursos===0){
            return response()->json(["erro"=>"Recurso não encontrado"],404);
        }
        return response()->json('',204);
    }
}
