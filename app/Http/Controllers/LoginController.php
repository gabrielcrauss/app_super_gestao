<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = null;
        if($request->get('erro') == 1)
            $erro = "Usuário ou senha inválidos";
        if($request->get('erro') == 2)
            $erro = "É necessário realizar o login para acessar a página";

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {

        // Regras de validação

        $regras=[
                    'usuario' => 'email',
                    'senha' => 'required',
                ];
        $feedback = [
                        'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
                        'senha.required' => 'O campo senha é obrigatório'
                    ];

        // Se não passar pelo validate, é feito um redirect para a rota antiga
        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $senha = $request->get('senha');

        //Iniciar o Model User

        $user = new User();

        $usuario = $user->where('email', $email)
                        ->where('password', $senha)
                        ->get()
                        ->first();


        if(isset($usuario->name))
        {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        }
        else
        {
            return redirect()->route('site.login',['erro' => 1]);
        }

        
            

        //return $request->usuario;
        //dd($request);
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
