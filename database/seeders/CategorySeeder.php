<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=> 'sport', 'id'=> 1]);
        Category::create(['name'=> 'hobbies', 'id'=> 2,]);
        Category::create(['name'=> 'food', 'id'=> 3]);
    }
}
