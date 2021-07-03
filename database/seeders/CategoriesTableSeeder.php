<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'My Cat',
            'slug' => 'my-cat'
        ]);

        // DB::table('categories')->insert([
        //     'name' => 'Category Name',
        //     'slug' => 'category-nonrepeeted',
        //     'status' => 'draft'
        // ]);
    }
}
