<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf',
        'dt_contratacao',
        'dt_demissao',
    ];

    /*
        * Define a relação de funcionário tem um endereço
    */
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
