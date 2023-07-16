<?php

namespace Database\Factories;

use App\Models\eletrodomesticos;
use App\Models\marcas;
use Illuminate\Database\Eloquent\Factories\Factory;

class EletrodomesticoFactory extends Factory
{
    protected $model = eletrodomesticos::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
            'tensao' => $this->faker->randomElement(['110v', '220v']),
            'marca_id' => marcas::inRandomOrder()->first()->id,
        ];
    }
}
