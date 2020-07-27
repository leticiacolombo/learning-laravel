@extends('layouts.admin')

@section('title', 'LOGIN')
    
@section('content')

    @if (session('warning'))
        <x-alert>
           {{session('warning')}}
        </x-alert>
    @endif

    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="digite um e-mail">
        <br>
        <input type="password" name="password" placeholder="digite uma senha">
        <br>

        @if ($tries >=3)
            Você não pode tentar mais que 3 vezes.
        @else
            <input type="submit" value="entrar">
        @endif

    </form>

    Tentativas: {{ $tries }}
@endsection