<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas';
    
    //quando a chave for <> 'id' precisa colocar 
    //protected $primaryKey = 'id_tarefa';

    //tipo do campo da chave, por padrão assume inteiro
    //protected $keyType = 'string';

    //é para incrementar o campo?
    //public $incrementing = false;

    //created_at, updated_at
    public $timestamps = false;

    //const CREATED_AT = 'campo_dt_criado';
    //const UPDATED_AT = 'campo_dt_update';

    //campos permitidos para update junto com find
    protected $fillable = [ 'titulo' ];
}
