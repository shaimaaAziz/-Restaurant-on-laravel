<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReservationsSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ItemsSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);
//        $this->call(CartSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);


    }
}
