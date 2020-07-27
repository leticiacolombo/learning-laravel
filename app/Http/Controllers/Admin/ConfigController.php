<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        //pega o usuário logado
        $user = Auth::user();
        //ou usando o request 
        //$user = $request->user();

        echo "URL: ".$request->url();
        echo "Método: ".$request->method();

        //pega os dados quando o método é o get
        $data = $request->all();

        //outra forma de pegar o nome
        $dados = $request->input('nome');

        //quando não acha o dado, define valor padrão
        $cidade = $request->query('cidade', 'São Paulo');

        //ve se o campo foi enviado
        if ($request->has('estado')) {
            //echo "Tem estado";
        } else {
            //echo "Não tem estado";
        }

        //ve se o campo está enviado e preenchido
        if ($request->filled('estado')) {
            //echo "Tem estado preenchido";
        } else {
            //echo "Não tem estado preenchido";
        }

        //ve se não está vindo
        $estado = '';
        if ($request->missing('estado')) {
            $estado = 'SP';
        } else {
            $request->input('estado');
        }

        //o código acima pode ser substituido por
        $estado = $request->input('estado', 'SP');

        //pego somente os campos que eu quero
        $dados = $request->only(['nome']);
    
        //pego todos os campos, exceto estes
        $dados = $request->except(['_token']);

        $lista = [
            'ovo',
            'farinha',
            'fermento',
            'manteiga'
        ];

        $dados = [
            'nome' => $user->name,
            'idade' => $request->input('idade', '15'),
            'lista' => $lista,
            'lista2' => [],
            'seeform' => Gate::allows('see-form')
        ];

        //passando dados para a view
        //funciona também com admin/config e \admin\config, mas por convenção usa-se admin.config
        return view('admin.config', $dados);
    }

    public function info() {
        echo "Configurações INFO 3";
    }

    public function permissoes() {
        echo "Configurações PERMISSÕES 3";
    }
}
