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
        // Admin
        User::factory()->create([
            'name' => 'Lemos',
            'email' => env('ADMIN_EMAIL', 'admin@exemplo.com'), 
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')), 
        ]);

        $produtos = [
            [
                'nome' => 'Camisa Oficial do Vasco (Manto Sagrado)',
                'marca' => 'Kappa / Força Jovem',
                'preco_venda' => 299.90,
                'quantidade_estoque' => 7,
                'foto' => ''
            ],
            [
                'nome' => 'Gel Incolor Fixador de Peruca',
                'marca' => 'Segura Calvo',
                'preco_venda' => 39.90,
                'quantidade_estoque' => 15,
                'foto' => ''
            ],
            [
                'nome' => 'Pomada Modeladora Efeito Matte',
                'marca' => 'Barber Premium',
                'preco_venda' => 45.90,
                'quantidade_estoque' => 12,
                'foto' => ''
            ],
            [
                'nome' => 'Óleo Hidratante para Barba de Respeito',
                'marca' => 'Beard Growth',
                'preco_venda' => 35.00,
                'quantidade_estoque' => 5,
                'foto' => ''
            ],
            [
                'nome' => 'Loção Pós-Barba que Arde até a Alma',
                'marca' => 'Old School',
                'preco_venda' => 25.50,
                'quantidade_estoque' => 10,
                'foto' => ''
            ]
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }

        $this->call([
            BarbeiroSeeder::class,
            ServicoSeeder::class,
        ]);
    }
}