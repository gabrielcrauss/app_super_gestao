<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2, string $p3 = null)
    {
        //Operador ternário
        $variavel = $p1>10 ? $varialvel = "Maior que 10" : "Não é maior que 10";
        //echo $variavel;
        
        //return "A soma é " . $p1 + $p2;

        // Passando parâmentros para a View por array associativo
        // return view('site.teste', ['p1' => $p1, 'p2' => $p2]);

        // Passando parâmentros para a View por Compact | Compact Cria o array associativo
        return view('site.teste', compact('p1','p2', 'p3'));

         // Passando parâmentros para a View por WITH
         //return view('site.teste')->with('p1', $p1)->with('p2', $p2);
        
    }
}
