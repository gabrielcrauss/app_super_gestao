<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use \Illuminate\Database\Eloquent\Factory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Nome Contato';
        $contato->telefone = '8465153151';
        $contato->email = 'mailto:contact@';
        $contato->motivo = 1;
        $contato->mensagem = 'Mensagem do contrato';

        $contato->save();
        */

        \App\Models\SiteContato::factory(100)->create();
    }
}
