<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('categories')->insert([
            ['name' => 'Furniture', 'description' => 'Home furniture'],
            ['name' => 'Electrical Goods', 'description' => 'Electrical products'],
            ['name' => 'Groceries', 'description' => 'Food products'],
            ['name' => 'Clothing', 'description' => 'Men\'s and Women\'s clothing'],
        ]);
    }
    
    public function down()
    {
        DB::table('categories')->whereIn('name', ['Furniture', 'Electrical Goods', 'Groceries', 'Clothing'])->delete();
    }
    
};
