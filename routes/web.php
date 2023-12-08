<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\LogAcessoMiddleware;


/////////////////////////
// Principal
//log.acesso
// Poderia chamar o middleware aqui middleware(LogAcessoMiddleware::class)
Route::middleware('log.acesso')
    ->get('/','\App\Http\Controllers\PrincipalController@principal')
    ->name('site.index');
    

/////////////////////////
// Sobre Nós
Route::get('/sobre-nos', '\App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

/////////////////////////
// Contato
Route::get('/contato',   '\App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato',   '\App\Http\Controllers\ContatoController@salvar')->name('site.contato');

/////////////////////////
// Login
Route::get('/login/{erro?}', '\App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', '\App\Http\Controllers\LoginController@autenticar')->name('site.login');

/////////////////////////
// Gropo APP
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function()
{
    Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('app.home');
    Route::get('/sair', '\App\Http\Controllers\LoginController@sair')->name('app.sair');
    Route::get('/cliente', '\App\Http\Controllers\ClienteController@index')->name('app.cliente');
    
    // Fornecedores
    Route::get('/fornecedor', '\App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', '\App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar/{page?}', '\App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', '\App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', '\App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', '\App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', '\App\Http\Controllers\FornecedorController@excluir')->name('app.fornecedor.excluir');

    //Produtos
    Route::resource('produto', '\App\Http\Controllers\ProdutoController');

});

Route::fallback(function()
{
    echo 'A Página não existe! <a href="'. route('site.index'). '">Clique aqui </a> para ir para página inicial!';
});



// Redirecionamento de Rota
Route::get('/rota1', function () { return 'Rota 1';})->name('site.rota1');
// Poder ser esse Redirect
//Route::redirect('/rota2', '/rota1');
// Pode ser pelo método redirect
Route::get('/rota2', function () { return redirect()->route('site.rota1');});

/////////////////////////
// Testes

Route::get('/teste/{p1}/{p2}/{p3?}', '\App\Http\Controllers\TesteController@teste')->name('site.teste');

// Expressões regulares para os parâmetros
Route::get('/teste2/{nome}/{categoria_id}/{assnto}/{mensagem?}', function 
(
    string $nome, 
    int $categoria_id = 1, 
    string $assunto, 
    string $mensagem = null
)
{
    echo "Nome: " . $nome . "<br>";
    echo "Categoria: " . $categoria_id . "<br>";
    echo "Assunto: " . $assunto . "<br>";
    echo "Mensagem: " . $mensagem . "<br>";
})->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+'); // Expressões regulares para os parâmetros

Route::get('/teste3', function () 
{
    return "Contato"; // view('welcome');
});