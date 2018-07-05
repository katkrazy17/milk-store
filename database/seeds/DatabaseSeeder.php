<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             $faker = Faker\Factory::create();
        DB::table('admins')->insert([
            'name' => 'admin',
            'lop' => 'quản lý',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '12312312312',
            'address' => $faker->address,
        ]);
    }
}
