<?php

namespace Database\Seeders;

use App\Models\Barbeiro;
use Illuminate\Database\Seeder;

class BarbeiroSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seu Madruga
        Barbeiro::create([
            'nome' => 'Seu Madruga Cabelos',
            'telefone' => '(11) 98888-7777',
            'especialidade' => 'Mestre em Bigodes',
            'bio' => 'Mais de 15 anos de experiência cortando cabelos na vila. Especialista em fugir do aluguel e em navalha clássica.',
            'foto' => ''
        ]);

        // 2. Lineu Silva
        Barbeiro::create([
            'nome' => 'Lineu da Grande Família',
            'telefone' => '(21) 97777-6666',
            'especialidade' => 'Corte com Fiscalização',
            'bio' => 'Ex-fiscal da vigilância sanitária. Garante o corte mais simétrico da região, tudo rigidamente dentro das normas da ANVISA.',
            'foto' => ''
        ]);

        // 3. Agostinho Carrara
        Barbeiro::create([
            'nome' => 'Agostinho Carrara Hair',
            'telefone' => '(21) 96666-5555',
            'especialidade' => 'Visagismo de Malandro',
            'bio' => 'Especialista em cortes que combinam com camisas floridas e calças xadrez. Se chorar, ele faz um desconto no estilo táxi.',
            'foto' => ''
        ]);

        // 4. Edward Mãos de Tesoura
        Barbeiro::create([
            'nome' => 'Eduardo Mãos de Tesoura',
            'telefone' => '(11) 95555-4444',
            'especialidade' => 'Degradê Ultra Rápido',
            'bio' => 'Meio tímido e calado, mas tem uma agilidade inacreditável com as lâminas. Só não peça para ele coçar sua cabeça.',
            'foto' => ''
        ]);
    }
}