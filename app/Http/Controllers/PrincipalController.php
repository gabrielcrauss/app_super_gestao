<?php

namespace App\Http\Controllers;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {

        $motivo_contatos = MotivoContato::all();


        /*
        $motivo_contatos = [
            '1' => "Dúvida",
            '2' => "Elogio",
            '3' => "Reclamação",
        ];
        */

        $titulo = "Home";
        return view('site.principal', ["titulo" => $titulo, "motivo_contatos" => $motivo_contatos]);
    }
    
}
