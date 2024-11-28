<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = fake()->unique()->name();
        return [
            'nome' => $nome,
            'descricao' => fake()->paragraph(),
            'preco' => fake()->randomNumber(2),
            'slug' => Str::slug($nome),
            'imagem' => fake()->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(),
            'id_categoria' => Categoria::pluck('id')->random()
        ];
    }
}
