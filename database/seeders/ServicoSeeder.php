<?php

namespace Database\Seeders;

use App\Models\Servico;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        Servico::create([
            'nome' => 'Corte Nevou Blindado Supremo',
            'preco' => '80.00',
            'descricao' => 'Descoloração global que brilha no escuro com finalização em laquê que resiste a terremotos, furacões e capacete de moto.',
            'foto' => ''
        ]);
        Servico::create([
            'nome' => 'Barbaterapia do Agostinho',
            'preco' => '45.00',
            'descricao' => 'Alinhamento de barba feito na navalha clássica, com direito a toalha quente com aroma de hortelã e uma massagem facial relaxante.',
            'foto' => ''
        ]);
        Servico::create([
            'nome' => 'Corte Clássico sem Enrolação',
            'preco' => '30.00',
            'descricao' => 'Aquele corte social ou degradê rápido na máquina e tesoura. Sem massagem, sem frescura e perfeito para quem está fugindo de cobradores.',
            'foto' => ''
        ]);
    }
}