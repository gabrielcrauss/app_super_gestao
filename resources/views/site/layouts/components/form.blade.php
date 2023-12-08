{{ $slot }}


{{ $x ?? ""}}

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" type="text" value='{{ old('nome')}}' placeholder="Nome" class="{{ $classe }}">
    <br>
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif

    <input name="telefone" type="text" value='{{ old('telefone')}}' placeholder="Telefone" class="{{ $classe }}">
    <br>
    {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}    

    <input name="email" type="text" value='{{ old('email')}}' placeholder="E-mail" class="{{ $classe }}">
    <br>
    {{ $errors->has('email') ? $errors->first('email') : ''}}
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
            @foreach($motivo_contatos as $key => $motivo_contato)
                <option {{ old('motivo_contatos_id') == $motivo_contato->id ?  " selected " : "" }} value="{{$motivo_contato->id}}">{{$motivo_contato->motivo_contato}}</option>
            @endforeach
    </select>
    <br>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}    
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ?  old('mensagem') : "Preencha o campo" }}</textarea>
    <br>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : ''}} 
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if($errors->any())
    <!-- <div style="position:absolute; top:0px; width:100%; background:red"> 
        @foreach ($errors->all() as $erro)
            {{--  $erro --}}
            <br>        
        @endforeach
    </div>    
-->

    {{-- print_r($errors) --}}

@endif


