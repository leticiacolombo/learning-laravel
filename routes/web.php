<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Diferentes formas de carregar uma view
Route::get('/', 'HomeController');
Route::view('/teste', 'teste');

//Rotar com parâmetros
Route::get('/noticia/{slug}', function($slug) {
    echo "Slug".$slug;
});

Route::get('/noticia/{slug}/comentario/{id}', function($slug, $id) {
    echo "Mostrando o comentário ".$id." da noticia ".$slug;
});

// Rotas com Regex + provider
Route::get('/user/{name}', function($name) {
    echo "Mostrando nome do usuário ".$name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function($id) {
    echo "Mostrando ID do usuário ".$id;
})/*->where('id', '[0-9]+')*/; //não precisa do filtro pq foi colocado um Route::pattern em RouteServiceProvider.php

//Rotas com nome + redirect
// Route::get('/config', function() {
//     //Pegar nome da rota
//     $link = route('informacoes');
//     /* echo "LINK : ".$link; */

//     //Redirecionar pelo nome da rota
//     /* return redirect()->route('permissoes'); */

//     return view('config');
// });

// Route::get('config/info', function() {
//     echo 'INFO';
// })->name('informacoes');

// Route::get('config/permissoes', function() {
//     echo 'Permissões';
// })->name('permissoes');

//Grupo de Rotas
Route::prefix('/config')->group(function() {
    Route::get('/', 'Admin\ConfigController@index');
    Route::post('/', 'Admin\ConfigController@index');

    Route::get('info', 'Admin\ConfigController@info');
    Route::get('permissoes', 'Admin\ConfigController@permissoes');
});

Route::prefix('/tarefas')->group(function() {
    Route::get('/', 'TarefasController@list')->name('tarefas.list'); //Listagem de tarefas
    
    Route::get('add', 'TarefasController@add')->name('tarefas.add'); //Tela de adição de nova tarefa
    Route::post('add', 'TarefasController@addAction'); //AÇÃO de adição de nova tarefa

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //Tela de edição de nova tarefa
    Route::post('edit/{id}', 'TarefasController@editAction'); //AÇÃO de edição de nova tarefa

    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); //AÇÃO de deletar

    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); //marcar resolvido ou não resolvido
});

Route::fallback(function() {
    return view('404');
});