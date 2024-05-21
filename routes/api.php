<?php

use App\Http\Controllers\MusicaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Música
Route::post('musica/cadastroMusica',
[MusicaController::class, 'cadastroMusica']);

Route::delete('musica/excluirMusica/{id}',
[MusicaController::class, 'excluirMusica']);

Route::put('musica/atualizarMusica',
[MusicaController::class, 'atualizarMusica']);

Route::get('musica/retornarTodasMusicas',
[MusicaController::class, 'retornarTodasMusicas']);

Route::get('musica/find/{id}',
[MusicaController::class, 'pesquisarPorId']);

Route::get('musica/pesquisarPorTitulo',
[MusicaController::class, 'pesquisarPorTitulo']);

Route::get('musica/pesquisarPorArtista',
[MusicaController::class, 'pesquisarPorArtista']);
