<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'cadfun';
    protected $primaryKey = 'codigo';
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'dt_atualizacao';    

    protected $fillable = [
        'nome_fun',
        'email',
    ];
    
    /*
        * Define a relação de funcionário tem um endereço
    */
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'codigo_fun', 'codigo');
    }

}
