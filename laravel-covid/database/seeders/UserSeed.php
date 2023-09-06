<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Rafa Prayata',
            'email' => 'rafa@gmail.com',
            
            'password' => Hash::make('12345'),
        ]);
        DB::table('users')->insert([
            'name' => 'dimas',
            'email' => 'dimas@gmail.com',
            
            'password' => Hash::make('12345'),
        ]);
    }
}
