<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contacts')->insert([
            'id'=> '100',
            'name' => 'Amany ',
            'email' =>'Amany@gmail.com',
            'subject' => 'suggestion',
            'phone' => '0599831456',
            'message' => 'I Think if you change the color of website '
        ]);

        DB::table('contacts')->insert([
            'id'=> '101',
            'name' => 'Lana ',
            'email' =>'Lana@gmail.com',
            'subject' => 'problem',
            'phone' => '0597851986',
            'message' => 'How I can login to website'
        ]);
    }
}
