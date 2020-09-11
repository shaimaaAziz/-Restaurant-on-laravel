<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//          $dt = Carbon::now();
////          $dateNow = $dt->toDateTimeString();
//
        DB::table('reservations')->insert([
//            'amount'=> '5',
            'name' => 'Ahmad ',
            'phone' => '059546545',
            'email' =>'ahmad@gmail.com',
             'date_and_time' => "",
            'message' => 'I want to reserve for 5 people',
            'status' => false
        ]);

        DB::table('reservations')->insert([
//            'amount'=> '8',
            'name' => 'Tala ',
            'phone' => '0259351568',
            'email' =>'tala@gmail.com',
             'date_and_time' => "",
            'message' => 'I want to reserve for 8 people',
            'status' => false
        ]);

        DB::table('reservations')->insert([
//            'amount'=> '10',
            'name' => 'samer ',
            'phone' => '059546545',
            'email' =>'samer12@gmail.com',
              'date_and_time' => "",
            'message' => 'I want to reserve for 10 people',
            'status' => false
        ]);

    }
}
