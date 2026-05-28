<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'cadend';
    protected $primaryKey = 'codigo';
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'complemento',
        'estado',
        'cep',
        'codigo_fun',
    ];
    
    /*
        * Define a relação de endereço pertence a um funcionário
    */
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'codigo_fun', 'codigo');
    }
}
