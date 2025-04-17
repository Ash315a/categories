<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // إضافة الأقسام الأساسية بالإنجليزية
        $categories = [
            ['name' => 'Furniture', 'description' => 'Home furniture'],
            ['name' => 'Electrical Goods', 'description' => 'Electrical products'],
            ['name' => 'Groceries', 'description' => 'Food products'],
            ['name' => 'Clothing', 'description' => 'Men\'s and Women\'s clothing'],
        ];

        // إدخال الأقسام في قاعدة البيانات
        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);

        }
    }
}


