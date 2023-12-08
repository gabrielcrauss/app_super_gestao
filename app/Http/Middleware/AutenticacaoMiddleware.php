<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {

        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != '')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('site.login', ['erro' => 2]);
        }
        //return $next($request);

        // Se fez o login

        /*
        echo $metodo_autenticacao . " - $perfil <br>";

        if($metodo_autenticacao == 'padrao')
        {
            echo "Verifica o usuário e senha no banco<br>";
        }
        if($perfil == 'visitante')
        {
            echo "Exibir apenas alguns recursos<br>";
        }
        else
            echo "Carregar o perfil do banco de dados<br>";

        if(false)
        {
            return $next($request);
        }
        else
        {
            return Response('Acesso Negado! A rota precisa de autenticação');
        }
        */
    }
}
