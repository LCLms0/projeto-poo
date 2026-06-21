<?php

namespace Database\Factories;

use App\Models\Barbeiro;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarbeiroFactory extends Factory
{
    protected $model = Barbeiro::class;

    public function definition(): array
    {
        $especialidades = ['Degradê & Navalha', 'Barba Terapia', 'Cortes Clássicos', 'Visagismo', 'Colorometria Hair'];

        return [
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->cellphoneNumber(),
            'especialidade' => $this->faker->randomElement($especialidades),
            'bio' => $this->faker->paragraph(2),
            'foto' => '', 
        ];
    }
}