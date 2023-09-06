<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MasSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Rafa Prayata',
            'email' => 'rafa@gmail.com',
            'nik' => '3326160608070446 ',
            'password' => Hash::make('12345'),
        ]);
       
    }
}
