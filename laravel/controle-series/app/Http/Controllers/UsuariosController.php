<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = User::query()->orderBy('name')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('usuarios.index',['usuarios'=>$usuarios,'mensagem'=>$mensagem]);
    }
}
