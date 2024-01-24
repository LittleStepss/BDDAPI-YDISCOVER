<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Ryan',
            'prenom' => 'Reynolds',
            'mail' => 'r.reynolds@gmail.com',
            'password' => 'toto123',
            'success' => 'True',
        ]);
    }
}
