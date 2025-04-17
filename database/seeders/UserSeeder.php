<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Elham Syahrian Putra',
            'email' => 'elhamsyahrianputra@student.uns.ac.id',
            'password' => bcrypt('password')
        ]);

        User::factory()->count(50)->create();
    }
}
