<?php

namespace Database\Factories\Seguridad;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;
    /**
     * Define the model's default state.
     * 
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuarioAlias' => $this->faker->userName(), // Usamos userName para un alias
            'usuarioNombre' => $this->faker->name(),
            'usuarioEmail' => $this->faker->unique()->safeEmail(),
            'usuarioPassword' => Hash::make('password'),
            // 'remember_token' => Str::random(10),
        ];
    }
}
