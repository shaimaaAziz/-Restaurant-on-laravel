<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'pizza',
            'description' => 'pizza-vegetarian' ,
            'price' => '100' ,
            'images' => '1559303735.jpg' ,
            'category_id' => '1'
        ]);

        DB::table('items')->insert([
            'name' => ' fresh-greek',
            'description' => 'salad ' ,
            'price' => '20' ,
            'images' => '1559235334.jpg' ,
            'category_id' => '2'
        ]);

        DB::table('items')->insert([
            'name' => 'traditional-italian ',
            'description' => 'sandwich-with-ham-and-cheese-served-warm' ,
            'price' => '200' ,
            'images' => 'food9.jpg' ,
            'category_id' => '3'
        ]);
    }
}





