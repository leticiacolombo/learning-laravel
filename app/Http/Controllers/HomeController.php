<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class HomeController extends Controller
{
    public function __invoke() {
        // é executado quando tentam acessar o controller sem passar nenhuma action
        //return view('welcome');

        //pega tudo
        $list = Tarefa::all();

        //pega obj pela chave primária
        //$item = Tarefa::find(2);
        //$list = Tarefa::find([1,2,3]);

        //qtd de linhas
        //$total = Tarefa::where('resolvido', 0)->count();

        //where resolvido = 0
        // ->first()
        //$list = Tarefa::where('resolvido', 0)->get();
        
        //criar um novo elemento
        // $t = new Tarefa;
        // $t->titulo = 'Testanto pelo Eloquent';
        // $t->save();

        //editar um item 
        // $t = Tarefa::find(3);
        // $t->titulo = "Teste alteração Eloquent";
        // $t->save();

        //delete
        // $t = Tarefa::find(2);
        // $t->delete();

        //Edição em massa
        //Tarefa::where('resolvido', 0)->update(['resolvido' => 1]);

        //Delete em massa
        //Tarefa::where('resolvido', 1)->delete();

        foreach ($list as $item) {
            echo $item->titulo.'-'.$item->resolvido.'<br>';
        }
    }
}
