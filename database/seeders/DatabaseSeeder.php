<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Lemos',
            'email' => env('ADMIN_EMAIL', 'admin@exemplo.com'), 
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')), 
        ]);

        $produtos = [
            [
                'nome' => 'Pomada Modeladora Efeito Matte',
                'marca' => 'Barber Premium',
                'preco_venda' => 45.90,
                'quantidade_estoque' => 12,
                'foto' => ''
            ],
            [
                'nome' => 'Óleo Hidratante para Barba 30ml',
                'marca' => 'Beard Growth',
                'preco_venda' => 35.00,
                'quantidade_estoque' => 3,
                'foto' => ''
            ],
            [
                'nome' => 'Shampoo Ice Mentolado 300ml',
                'marca' => 'Barber Premium',
                'preco_venda' => 29.90,
                'quantidade_estoque' => 20,
                'foto' => ''
            ],
            [
                'nome' => 'Cera de Bigode Forte',
                'marca' => 'Old School',
                'preco_venda' => 25.00,
                'quantidade_estoque' => 8,
                'foto' => ''
            ],
            [
                'nome' => 'Balm Alinhador de Fios',
                'marca' => 'Beard Growth',
                'preco_venda' => 39.90,
                'quantidade_estoque' => 2,
                'foto' => ''
            ],
            [
                'nome' => 'Gel Incolor para Barbear 500g',
                'marca' => 'Sharp Razor',
                'preco_venda' => 19.90,
                'quantidade_estoque' => 15,
                'foto' => ''
            ],
            [
                'nome' => 'Tônico Capilar Antiqueda',
                'marca' => 'Bio Hair',
                'preco_venda' => 89.90,
                'quantidade_estoque' => 6,
                'foto' => ''
            ],
            [
                'nome' => 'Loção Pós-Barba Refrescante',
                'marca' => 'Old School',
                'preco_venda' => 32.50,
                'quantidade_estoque' => 10,
                'foto' => ''
            ],
            [
                'nome' => 'Navalhete de Aço Inox Profissional',
                'marca' => 'Sharp Razor',
                'preco_venda' => 55.00,
                'quantidade_estoque' => 4,
                'foto' => ''
            ],
            [
                'nome' => 'Gola Higiênica Rolo com 100 un',
                'marca' => 'Clean Cut',
                'preco_venda' => 12.00,
                'quantidade_estoque' => 25,
                'foto' => ''
            ]
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}