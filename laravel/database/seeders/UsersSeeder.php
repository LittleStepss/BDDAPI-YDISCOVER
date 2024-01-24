<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        users::create([
            'nom' => 'Ryan',
            'prenom' => 'Reynolds',
            'mail' => 'r.reynolds@gmail.com',
            'password' => 'toto123',
            'success' => true,
        ]);
        users::create([
            'nom' => 'Jessica',
            'prenom' => 'Souhou',
            'mail' => 'jesssh@gmail.com',
            'password' => 'tata123',
            'success' => true,
        ]);
    }
}
