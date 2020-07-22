@extends('layouts.admin')
@section('title', 'Configurações')

@section('content')
<h1>Configurações</h1>

<a href="/logout">Sair</a>

{{-- Forma normal de usar um componente criado --}}
{{-- @component('alert')
    @slot('type')
        Erro:
    @endslot

    Exemplo de uso de um componente
@endcomponent --}}

{{-- Forma abreviada de umas o componente criado  --}}
<x-alert>
    Conteúdo
</x-alert>

<br>

Meu nome é {{ $nome }} <br>
Eu tenho {{ $idade }} anos <br>

<hr>

@if($idade > 18 && $idade <= 60)
    Eu sou um adulto
@elseif($idade > 60 && $idade <= 120)
    Eu sou um idoso
@else
    Eu sou menor de idade
@endif

<br>

@isset($versao)
    Existe uma versão e é a {{$versao}}
@endisset

<br>

@empty($cidade)
    Não existe uma cidade
@endempty

<hr>

@for ($i = 0; $i < 10; $i++)
    O valor é {{$i}} <br>
@endfor

<hr>

Lista do bolo:
<ul>
    @foreach ($lista as $item)
        <li>{{$item}}</li>
    @endforeach
</ul>

<hr>

<ul>
    @forelse ($lista2 as $item)
        <li>{{$item}}</li>
    @empty
        <li>Não há ingredientes</li>
    @endforelse
</ul>

<form method="POST">
    @csrf <!-- Envia um _token junto com a requisição -->

    Nome:<br/>
    <input type="text" name="nome"><br/>

    Idade:<br/>
    <input type="text" name="idade"><br/>

    <input type="submit" value="Enviar">
</form>

<a href="/config/info">Informações</a>
@endsection