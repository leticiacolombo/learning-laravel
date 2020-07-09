<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {
        echo "URL: ".$request->url();
        echo "Método: ".$request->method();

        //pega os dados quando o método é o get
        $data = $request->all();

        //outra forma de pegar o nome
        $dados = $request->input('nome');

        //quando não acha o dado, define valor padrão
        $cidade = $request->query('cidade', 'São Paulo');

        return view('config');
    }

    public function info() {
        echo "Configurações INFO 3";
    }

    public function permissoes() {
        echo "Configurações PERMISSÕES 3";
    }
}
