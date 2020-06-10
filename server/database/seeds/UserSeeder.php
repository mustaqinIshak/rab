<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'              => 'takin',
            'email'             => 'mustaqinishak@gmail.com',
            'password'          => bcrypt('takin230793'),
        ]);
    }
}
