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
    
    /*
        * Define a relação de funcionário tem muitos projetos
    */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project', 'employee_id', 'project_id');
    }
}
