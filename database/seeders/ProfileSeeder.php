<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $academicProgram = [
            'Pendidikan Teknik Informatika dan Komputer',
            'Pendidikan Teknik Mesin',
            'Pendidikan Teknik Bangunan',
            'Pendidikan Kimia',
            'Pendidikan Fisika',
            'Pendidikan Biologi',
            'Pendidikan Akutansi',
            'Pendidikan Geografi',
            'Pendidikan Matematika'
        ];

        $semester = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10
        ];

        $sex = ['male', 'female'];




        foreach ($users as $index => $user) {
            if ($user->name === "Elham Syahrian Putra") {
                Profile::create([
                    'user_id' => $user->id,
                    'gender' => 'male',
                    'identity_number' => 'K3520023',
                    'academic_program' => 'Pendidikan Teknik Informatika dan Komputer',
                    'phone' => "08" . fake()->randomNumber(5, true) . fake()->randomNumber(5, true),
                    'semester' => Arr::random($semester),
                ]);
            } else {

                Profile::create([
                    'user_id' => $user->id,
                    'gender' => Arr::random($sex),
                    'identity_number' => "K15200" . $index + 10,
                    'academic_program' => Arr::random($academicProgram),
                    'phone' => "08" . fake()->randomNumber(5, true) . fake()->randomNumber(5, true),
                    'semester' => Arr::random($semester),
                ]);
            }
        }
    }
}
