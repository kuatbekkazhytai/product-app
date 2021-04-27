<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Please enter your email instead of 'kuatbek.kazhytai@nu.edu.kz';
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'kuatbek.kazhytai@nu.edu.kz',
            'password' => Hash::make('password'),
        ]);
    }
}
