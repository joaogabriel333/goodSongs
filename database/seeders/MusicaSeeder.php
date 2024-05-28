<?php

namespace Database\Seeders;

use App\Models\Musica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {


            Musica::create([
                'titulo'=>'musica'.$i,
            'duracao'=> $i,
            'artista'=>'fulano',
            'genero'=>'funk',
            'nacionalidade'=>'Brasileiro',
            'ano_lancamento'=>'2024-10-10',
            'album'=>''
            ]);
    }
}
}