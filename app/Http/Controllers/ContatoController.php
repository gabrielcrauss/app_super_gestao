<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();
        /*
        $motivo_contatos = [
            '1' => "Dúvida",
            '2' => "Elogio",
            '3' => "Reclamação",
        ];
        /*
        //dd($request);
        //print_r($request->all());
        //echo $request->input('nome'); //['email'];
        //exit();

        //var_dump($_POST);

        //Capturando as informações do formulário e salvando
        /*
        $contato = new SiteContato();
        $contato->nome     = $request->input('nome');
        $contato->email    = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->motivo   = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());

        $contato->save();
        */

        //$contato = new SiteContato();
        //Pode ser assim com o Fill ou create, pega todos os campos do formulário
        //$contato->fill($request->all());
        //$contato->create($request->all());



        //$contato->save();

        //print_r($contato->getAttributes());

        
        $titulo = "Contato";
        return view('site.contato', ["titulo" => $titulo, 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar a validação dos dados do formulário recebidos no request


        $regras = [
                    'nome' => 'required|min:3|max:40|unique:site_contatos',
                    'telefone' => 'required',
                    'email' => 'email',
                    'motivo_contatos_id' => 'required',
                    'mensagem' => 'required|max:2000'
                ];
        $feedback = [
                        'nome.required' => 'O compo nome é obrigatório',
                        'nome.min' => 'A quantidade mínima do nome é 3 caracteres',
                        'nome.max' => 'A quantidade máxima do nome é 40 caracteres',
                        'telefone.required' => 'O compo telefone é obrigatório',
                        'email.email' => 'O e-mail é inválido',
                        'required' => 'O campo :attribute deve ser preenchido'
                    ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
