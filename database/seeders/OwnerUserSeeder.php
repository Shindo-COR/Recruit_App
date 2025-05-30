<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;



class OwnerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //      User::create([
        //     'name' => 'testowner',
        //     'email' => 'owner@test.com',
        //     'phone_num' => '0120111111',
        //     'password' => Hash::make('password123'),
        //     'role' => 1, // オーナー
        //     'remember_token' => Str::random(10),
        // ]);
          User::create([
            'name' => 'testadmin',
            'email' => 'admin@test.com',
            'phone_num' => '0120111112',
            'password' => Hash::make('password123'),
            'role' => 2, // オーナー
            'remember_token' => Str::random(10),
        ]);
    }
}
