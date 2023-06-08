<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['java script', 'typescript', 'Secondi', 'Dolce', 'Antipasti'];
        foreach ($categories as $category_value) {
            $new_category = new Type();
            $new_category->name = $category_value;
            $new_category->slug = Str::slug($category_value);
            $new_category->save();
        }
    }
}
