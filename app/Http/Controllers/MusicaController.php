<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicaRequest;
use App\Http\Requests\MusicaUpdateRequest;
use App\Models\musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function cadastroMusica(MusicaRequest $request)
    {
        $musicaExistente = Musica::where('titulo', $request->titulo)->where('artista', $request->artista)->first();
        if (isset($musicaExistente)) {
            return response()->json([
                "status" => false,
                "message" => "Esse artista já possui esse titulo "
            ], 400);
        }
        $musica = Musica::create([
            'titulo' => $request->titulo,
            'duracao' => $request->duracao,
            'artista' => $request->artista,
            'genero' => $request->genero,
            'nacionalidade' => $request->nacionalidade,
            'ano_lancamento' => $request->ano_lancamento,
            'album' => $request->album
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Musica cadastrada com sucesso',
            'data' => $musica

        ], 200);
    }


    public function retornarTodasMusicas()
    {
        $musica = musica::all();

        if (count($musica) > 0) {
            return response()->json([
                'res'=> true,
                'data'=>$musica
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => 'Não há nenhuma musica registrada'
        ]);
    }


    public function excluirMusica(Request $request)
    {
        $musica = Musica::find($request->id);

        if (!isset($musica)) {
            return response()->json([
                'status' => false,
                'message' => "Musica não foi encontrada"
            ]);
        }

        $musica->delete();
        return response()->json([
            'status' => true,
            'message' => "Musica foi excluida com sucesso"
        ]);
    }

   public function editarMusica(MusicaController $request)
    {
        $musica = Musica::find($request->id);
        if (!isset($musica)) {
            return response()->json([
                'status' => false,
                'message' => "Nenhuma musica foi encontrada"
            ]);
        }

        if (isset($request->titulo)) {
            $musica->titulo = $request->titulo;
        }

        if (isset($request->duracao)) {
            $musica->duracao = $request->duracao;
        }
        if (isset($request->artista)) {
            $musica->artista = $request->artista;
        }
        if (isset($request->genero)) {
            $musica->genero = $request->genero;
        }
        if (isset($request->nacionalidade)) {
            $musica->nacionalidade = $request->nacionalidade;
        }
        if (isset($request->ano_lancamento)) {
            $musica->ano_lancamento = $request->ano_lancamento;
        }
        if (isset($request->album)) {
            $musica->album = $request->album;
        }

        $musica->update();

        return response()->json([
            'status' => true,
            'message' => 'Musica atualizada.'
        ]);
    }

    public function pesquisarPorId(Request $request)
    {
        $musica = Musica::find($request->id);

        if (!isset($musica)) {
            return response()->json([
                'status' => false,
                'message' => "Musica não encontrada"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $musica
        ]);
    }

    public function pesquisarPorTitulo(Request $request)
    {
        $musica = Musica::where('titulo', 'like', '%' . $request->titulo . '%')->get();

        if (count($musica) > 0) {
            return response()->json([
                'status' => true,
                'data' => $musica
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa'
        ]);
    }

    public function pesquisarPorArtista(Request $request)
    {
        $musica = Musica::where('artista', 'like', '%' . $request->artista . '%')->get();

        if (count($musica) > 0) {
            return response()->json([
                'status' => true,
                'data' => $musica
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultado para pesquisa'
        ]);
    }
}