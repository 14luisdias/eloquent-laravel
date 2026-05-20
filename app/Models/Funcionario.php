<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'cadfun';
    protected $primaryKey = 'codigo';
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'dt_atualizacao';    

    protected $fillable = [
        'nome_fun',
        'email',
    ];
}
