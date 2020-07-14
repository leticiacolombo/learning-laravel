@extends('layouts.admin')
@section('title', 'Edição de Tarefas')

@section('content')
    <h1>Edição de tarefas</h1>

    @if (session('warning'))
        <x-alert>
            {{ session('warning') }}
        </x-alert>
    @endif

    <form method="post">
        @csrf

        <label for="Titulo">Título:</label>
        <input type="text" name="titulo" value="{{ $data->titulo }}">

        <input type="submit" value="Editar">
    </form>
@endsection