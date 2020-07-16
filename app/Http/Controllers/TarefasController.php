<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tarefa;

class TarefasController extends Controller
{
    public function list() {
        //método sql
        //$list = DB::select('SELECT * FROM tarefas');

        //eloquent
        $list = Tarefa::all();

        return view('tarefas.list', ['list' => $list]);
    }

    public function add() {
        return view('tarefas.add');
    }

    public function addAction(Request $request) {
        //Jeito 1 de fazer
        /*if ($request->filled('titulo')) {
            $title = $request->input('titulo');

            DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
                'titulo' => $title
            ]);

            return redirect()->route('tarefas.list');
        } else {
            return redirect()
                ->route('tarefas.add')
                ->with('warning', 'Você não preencheu o título');
        }*/

        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $title = $request->input('titulo');

        //método SQL
        /*DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', [
            'titulo' => $title
        ]);*/

        $t = new Tarefa;
        $t->titulo = $title;
        $t->save();

        return redirect()->route('tarefas.list');    
    }

    public function edit($id) {
        /*$data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);*/
        $data = Tarefa::find($id);;

        //if (count($data) > 0) {
        if ($data) {
            return view('tarefas.edit', [
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id) {
        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        /*DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
            'id' => $id,
            'titulo' => $request->input('titulo')
        ]);*/

        /*$t = Tarefa::find($id);
        $t->titulo = $request->input('titulo');
        $t->save();*/

        Tarefa::find($id)->update(['titulo' => $request->input('titulo')]);
        
        return redirect()->route('tarefas.list');
    }

    public function del($id) {
        /*DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);*/

        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }

    public function done($id) {
        /*DB::update('UPDATE tarefas SET resolvido = 1-resolvido WHERE id = :id', [
            'id' => $id
        ]);*/

        $t = Tarefa::find($id);

        if ($t) {
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }

        return redirect()->route('tarefas.list');
    }
}
