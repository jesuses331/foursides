<?php

namespace Database\Seeders;

use App\Models\Seguridad\Usuario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        Usuario::factory()->create([
            'usuarioAlias' =>'jesus',
            'usuarioNombre' =>'Test User',
            'usuarioEmail' => 'admin@gmail.com',
        ]);
        Usuario::factory(10)->create();
    }
}
