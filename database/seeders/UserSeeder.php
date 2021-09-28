<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'wramirez@misena.edu.co',
            'password' => bcrypt('123'),
            'name' => 'Wilson Ramirez Z'
        ]);
    }
}
