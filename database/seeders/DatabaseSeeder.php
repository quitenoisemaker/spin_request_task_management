<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@example.com'], 
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'client_key' => '6f79fd8326c18bf18514',
                'secret_key' =>'1c66e1263f36996da8f1dae5a31ee12d5499a05d3705432a5a090a0a5342cd8c',
            ]
        );
    }
}
