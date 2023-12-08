<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Podemos maniputra o $request
        //return $next($request);


        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(['log' => " $ip XYZ requisitou a rota $rota"]);

        //return $next($request);

        $resposta = $next($request);

        //$resposta->setStatusCode(201, 'O status da resposta e o texto foram modificados');

        return $resposta;

        //return Response('success');

        // Manipular a resposta antes de entregar para o Browser
    }
}
