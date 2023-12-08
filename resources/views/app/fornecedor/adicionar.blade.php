@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')


<div class='conteudo-pagina'>

    <div class="titulo-pagina-2">
        <p> Fornecedor - Adicionar</p>
    </div>

    <div class='menu'>
        <ul>
            <li> <a href="{{ route('app.fornecedor.adicionar') }}"> Novo </a> </li>
            <li> <a href="{{ route('app.fornecedor')}}"> Consulta </a> </li>
    </div>

    <div class='informacao-pagina'>
        {{ $msg ??  ''}}
        <div style='width: 30%; margin-left: auto; margin-right:auto;' >

            <form method= "post" action="{{ route('app.fornecedor.adicionar') }}">

                @csrf
                <input type="hidden" name='id' value="{{ $fornecedor->id ?? '' }}">
                <input type="text" value="{{ $fornecedor->nome ?? old('nome') }}" name="nome" placeholder='Nome' class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder='Site' class="borda-preta">
                {{ $errors->has('site') ? $errors->first('site') : '' }}

                <input type="text" name="uf" placeholder='UF' value="{{ $fornecedor->uf ?? old('if') }}" class="borda-preta">
                {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                <input type="text" name="email" placeholder='E-Mail' value="{{ $fornecedor->email ?? old('email') }}" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <button type="submit" class="borda-preta"> Cadastrar </button>
            </form>

    </div>

</div>


@endsection