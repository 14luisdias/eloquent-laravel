<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'complemento',
        'estado',
        'cep',
        'employee_id',
    ];

    /*
        * Define a relação de endereço pertence a um funcionário
    */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
