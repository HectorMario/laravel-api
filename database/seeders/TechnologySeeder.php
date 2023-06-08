<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['java script', 'typescript', 'php', 'phyton', 'java'];
        foreach ($categories as $technology_value) {
            $new_technology = new Technology();
            $new_technology->name = $technology_value;
            $new_technology->slug = Str::slug($technology_value);
            $new_technology->save();
        }
    }
}
