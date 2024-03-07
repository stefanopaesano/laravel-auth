<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 12) as $index) {
            DB::table('projects')->insert([
                'title' => $faker->sentence(6, true), // Genera un titolo fittizio
                'slug' => Str::slug($faker->unique()->sentence(6, true), '-'), // Genera uno slug univoco
                'image' => $faker->imageUrl(640, 480, 'projects', true), // Genera un URL di immagine fittizio
                'description' => $faker->paragraphs(asText: true), // Genera una descrizione fittizia
                'date' => $faker->date(), // Genera una data fittizia
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}