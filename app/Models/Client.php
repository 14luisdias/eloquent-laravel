<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'descricao',
    ]; 
    
    /*
        * Define a relação de cliente tem muitos projetos
    */
    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }
}
