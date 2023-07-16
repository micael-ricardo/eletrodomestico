<?php

namespace Database\Seeders;
use App\Models\Eletrodomestico;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class EletrodomesticosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Factory::factoryForModel(Eletrodomestico::class)->count(20)->create();
    }
}
