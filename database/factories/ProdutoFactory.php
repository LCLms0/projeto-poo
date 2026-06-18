<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition(): array
    {
        $produtosBarbearia = [
            ['nome' => 'Pomada Modeladora Efeito Matte', 'marca' => 'Barber Premium'],
            ['nome' => 'Óleo Hidratante para Barba', 'marca' => 'Beard Growth'],
            ['nome' => 'Shampoo Ice Mentolado 300ml', 'marca' => 'Barber Premium'],
            ['nome' => 'Cera de Bigode Forte Align', 'marca' => 'Old School'],
            ['nome' => 'Balm Alinhador de Fios', 'marca' => 'Beard Growth'],
            ['nome' => 'Gel Incolor para Barbear 500g', 'marca' => 'Sharp Razor'],
            ['nome' => 'Tônico Capilar Antiqueda', 'marca' => 'Bio Hair'],
            ['nome' => 'Locao Pós-Barba Refrescante', 'marca' => 'Old School']
        ];

        $produtoAleatorio = fake()->randomElement($produtosBarbearia);

        return [
            'nome' => $produtoAleatorio['nome'] . ' ' . fake()->randomElement(['Gold', 'Premium', 'Pro', 'Classic']),
            'marca' => $produtoAleatorio['marca'],
            'preco_venda' => fake()->randomFloat(2, 15, 120),
            'quantidade_estoque' => fake()->numberBetween(0, 30),
            'foto' => null,
        ];
    }
}