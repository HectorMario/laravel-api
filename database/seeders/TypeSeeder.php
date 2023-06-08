<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Colazione', 'Primi', 'Secondi', 'Dolce', 'Antipasti'];
        foreach ($categories as $category_value) {
            $new_category = new Type();
            $new_category->name = $category_value;
            $new_category->slug = Str::slug($category_value);
            $new_category->save();
        }
    }
}
