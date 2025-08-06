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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.uns.ac.id',
            'password' => bcrypt('password'),
        ]);
        
        $admin->assignRole('admin');

        $elham = User::create([
            'name' => 'Elham Syahrian Putra',
            'email' => 'elhamsyahrianputra@student.uns.ac.id',
            'password' => bcrypt('password')
        ]);
        $elham->assignRole('student');

        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('student');
        });
    }
}
