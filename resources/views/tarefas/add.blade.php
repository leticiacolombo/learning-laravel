@extends('layouts.admin')
@section('title', 'Listagem de Tarefas')

@section('content')
    <h1>Adição de tarefas</h1>

    {{-- Jeito 1 de fazer --}}
    {{-- @if (session('warning'))
        <x-alert>
            {{ session('warning') }}
        </x-alert>
    @endif --}}

    @if ($errors->any())
        <x-alert>
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </x-alert>
    @endif

    <form action="add" method="post">
        @csrf

        <label for="Titulo">Título:</label>
        <input type="text" name="titulo">

        <input type="submit" value="Adicionar">
    </form>
@endsection