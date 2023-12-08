@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')


<div class='conteudo-pagina'>

    <div class="titulo-pagina-2">
        <p> Produto - Listar</p>
    </div>

    <div class='menu'>
        <ul>
            <li> <a href=""> Novo </a> </li>
            <li> <a href=""> Consulta </a> </li>
    </div>

    <div class='informacao-pagina'>

        <div style='width: 90%; margin-left: auto; margin-right:auto;' >
            <table border='1' width = '100%'>
                <thead>
                    <tr>
                        <th> Nome </th>
                        <th> Descrição </th>
                        <th> Peso </th>
                        <th> Unidade ID </th>
                        <th> Excluir </th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td><a href=""> Excluir </a></td>
                            <td><a href=""> Editar </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          {{ $produtos->appends($request)->links() }} 

        Exibindo {{ $produtos->count();}} produtos de {{ $produtos->total();}} (de {{ $produtos->firstItem();}} a {{ $produtos->lastItem();}})
        <br>
        <br>
        <br>
        Total de registros por página:  {{ $produtos->count();}}
        <br>
        Total de registros da consulta:  {{ $produtos->total();}}
        <br>
        Número do primeiro registro da página:  {{ $produtos->firstItem();}}
        <br>
        Número do último registro da página:  {{ $produtos->lastItem();}}
        <br>
        <br>
        

    </div>

</div>


@endsection