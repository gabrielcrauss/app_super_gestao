P1 = {{ $p1 }}
<br>
P2 = {{ $p2 }}

<br>

A soma é

{{ $p1 + $p2 }}

<br>
<br>
isset<br>
@isset($p1)
    P1 EXISTE
@endisset

<br>
<br>
empty<br>
@empty($p1)
    P1 esta vazia
@endempty

<br>
<br>


if else<br>
@if($p1 > 1000)
        P1 é maior que 1000
    @elseif($p1 > 100)  
        P1 maior que 100
    @else P1 <= 100
@endif

<br>
<br>

unless<br>
@unless($p1 > 1000)
    P1 é menor que 1000
@endunless      

<br>
<br>

Operador ternário <br>
{{ $p1>10 ? 'P1 é maior que 1' : 'P1 não é maior que 10'}}

<br>
<br>
@php

    $variavel = $p1>10 ? $varialvel = "Maior que 10" : "Não é maior que 10";
    echo $variavel;
@endphp
<br>
<br>

Valor default se a variavel for null ou isset <br>
{{ $p3 ?? "Dado não preenchido"}}

{{-- Comentário --}}

<br>
<br>

{{ 'Texto de teste'}}

<br>
<br>

<?= 'Texto de teste 2' ?>

@php

    // Comentário em PHP

@endphp

<br>
<br>
For
@for($i = 0; $i <10; $i++)
     {{ $i }}
@endfor
<br>
<br>

While <br>
@php $z = 1 @endphp
@while($z < 10)

    {{ $z}}

    @php $z++ @endphp
@endwhile


<br>
<br>
@php
    $array = ["Gabriel", "João", " Rafael", "Rael"];
@endphp

Foreach
<br>
<br>
@foreach ($array as $elemento)
    Iteração do Foreach {{ $loop->iteration }}
    <br>
    {{$elemento}}
    <br>

    

    @if($loop->first)
        1ª Interação
        <br>
    @endif
    @if($loop->last)
        Última Interação
        <br>

        Total de Registros
        {{ $loop->count}}
<br>
    @endif


@endforeach


@{{ }}