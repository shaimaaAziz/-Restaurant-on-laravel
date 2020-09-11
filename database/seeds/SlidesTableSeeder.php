<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'id'=> '10',
            'title' => 'Best Food ',
            'sub_title' =>'Best Food sub title',
            'image' => '1561554450.png'
        ]);

        DB::table('slides')->insert([
            'id'=> '11',
            'title' => 'Best Salad ',
            'sub_title' =>'Best Salad sub title',
            'image' => '1561554147.jpg'
        ]);


    }
}
