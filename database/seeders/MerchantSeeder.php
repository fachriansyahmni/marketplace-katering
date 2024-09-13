<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = [
            [
                'company_name' => 'Merchant One',
                'email' => 'merchant1@mail.com',
                'password' => Hash::make('password'),
                'address' => 'Jl. Bandung',
                'contact' => '081234567890',
                'description' => 'Description for Merchant One',
                'location' => 'bandung',
            ],
            [
                'company_name' => 'Merchant Two',
                'email' => 'merchant2@mail.com',
                'password' => Hash::make('password'),
                'address' => 'Jl. Jakarta',
                'contact' => '089876543210',
                'description' => 'Description for Merchant Two',
                'location' => 'jakarta',
            ],
        ];

        DB::table('merchants')->insert($merchants);
    }
}
