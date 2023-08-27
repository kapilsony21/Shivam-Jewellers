<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $users = [
            
            [
                'name' => 'Kapil Soni',
                'email' => 'kapilsony21@gmail.com',
                'password' => Hash::make('admin@kapil123')
            ],
                        
            [
                'name' => 'Shivam Soni',
                'email' => 'shivsoni4455@gmail.com',
                'password' => Hash::make('admin@shivu123')
            ]

        ];

        foreach ($users as $userData) {
            \App\Models\User::create($userData);
        }
    }
}
