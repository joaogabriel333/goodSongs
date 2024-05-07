<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function cadastro{MusicaRequest $request}{
        $musica = musica::create([
            'nome'=>$request->nome,
            'duracao'=>$request->duracao,
            'artista'=>$request->artista,
            'genero'=>$request->genero,
            'nacionalidade'=>$request->nacionalidade,
            'ano_lançamento'=>$request->ano_lançamento,
            'album'=>$request->album,
        ]);
        return response()-> json 
    }
}
