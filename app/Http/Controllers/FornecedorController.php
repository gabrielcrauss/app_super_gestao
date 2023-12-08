<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
        /*
        $fornecedores = ['Fornecedor1'];
        return view('app.fornecedor.index', compact('fornecedores'));
        */
    }

    public function listar(Request $request)
    {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        //->get();
        ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = "";
        // CADASTRO
        if($request->input('_token') != "" && $request->input('id') == '')
        {
            $regras =
            [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback =
            [
                'required' => "O campo :attribute deve ser preenchido",
                'nome.min' => "O campo nome deve ter no mínimo 3 caracteres",
                'nome.max' => "O campo nome deve ter no máximo 40 caracteres",
                'uf.max' => "O campo UF deve ter 2 caracteres",
                'uf.min' => "O campo UF deve ter 2 caracteres",
                'email.email' => "O campo E-Mail é inválido",
            ];

            $request->validate($regras,$feedback);


            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = "Cadastro realizado com sucesso";
            return view('app.fornecedor.adicionar', ['msg' => $msg]);
        }

        // EDIÇÃO
        if($request->input('_token') != "" && $request->input('id') != '')
        {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update)
            {
                $msg = 'Atualização realizada com sucesso';
            }
            else $msg = "ERRO 784447";

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'),'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
        
    }

    public function editar($id, $msg = "")
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
    
    public function excluir($id)
    {
        Fornecedor::find($id)->delete();
        // Como esta sendo usado o SoftDeletes, pode ser usado o forceDelete para deletar mesmo
        //Fornecedor::find($id)->forceDelete();
        
        return redirect()->route('app.fornecedor');
    }
}

/*
$busca = $site->where
(
    function($query)
    {
        $query->where('nome', 'Jorge')->orWhere('nome', 'Ana');
    }
)
->orWhere
(
    function($query)
{
    $query->whereIn('motivo', [1,3])->orWhereBetween('id', [4,6]);
}
)->get();
*/