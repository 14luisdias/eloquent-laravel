<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Client::factory(10)->create();

        Client::create([
            'nome' => 'Luis Sanches',
            'endereco' => 'Jose de Araujo 71, Bairro Chico Mendes, Rio Branco - AC',
            'descricao' => 'Cliente desde 2024',
        ]);
    }
}
