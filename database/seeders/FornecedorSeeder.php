<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'fornecedor@example.com';

        // Pode inserir com Save
        $fornecedor->save();

        // Para usar o create, tem que ter o método fillable na classe Fornecedor
        $fornecedor::create([
            'nome' => 'Fornecedor 200',
            'email' => 'fornecedor@example.com',
            'uf' =>'RS',
            'site' => 'site200.com.br'
        ]);

        // Query de Insert... Então não popula create_at e update_at, não usa o ORM
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'email' => 'fornecedor@example.com',
            'uf' =>'RS',
            'site' => 'site300.com.br'
        ]);
    }
}
