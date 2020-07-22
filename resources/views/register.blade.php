@extends('layouts.admin')

@section('title', 'Cadastro')
    
@section('content')

    @if ($errors->any())
        <x-alert>
            <ul>
            @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
            </ul>
        </x-alert>
    @endif

    <form method="POST">
        @csrf
    <input type="text" name="name" placeholder="digite seu nome" value="{{old('name')}}">
        <br>
        <input type="email" name="email" placeholder="digite um e-mail" value="{{old('email')}}">
        <br>
        <input type="password" name="password" placeholder="digite uma senha">
        <br>
        <input type="password" name="password_confirmation" placeholder="confirme a senha">
        <br>
        <input type="submit" value="cadastrar">

    </form>
@endsection