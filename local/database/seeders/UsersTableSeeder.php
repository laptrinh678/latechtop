<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'lapvt',
            'email' => 'laptrinh678@gmail.com',
            'password' =>  bcrypt('123'),
        ]);
    }
}
