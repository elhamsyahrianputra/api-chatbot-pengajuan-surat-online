<?php

namespace Database\Seeders;

use App\Models\LetterSubmission;
use App\Models\LetterType;
use App\Models\User;
use Illuminate\Database\Seeder;

class LetterSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'Elham Syahrian Putra')->first();
        $ijinPenelitian = LetterType::where('name', 'Ijin Penelitian')->first();
        $aktifKuliah = LetterType::where('name', 'Aktif Kuliah')->first();

        LetterSubmission::create([
            'user_id' => $user->id,
            'letter_type_id' => $ijinPenelitian->id,
            'file_path' => '/submission/file/1.pdf',
            'status' => 'submitted'
        ]);
        LetterSubmission::create([
            'user_id' => $user->id,
            'letter_type_id' => $aktifKuliah->id,
            'file_path' => '/submission/file/1.pdf',
            'status' => 'submitted'
        ]);

        LetterSubmission::create([
            'user_id' => $user->id,
            'letter_type_id' => $aktifKuliah->id,
            'file_path' => '/submission/file/1.pdf',
            'status' => 'revision'
        ]);

        LetterSubmission::create([
            'user_id' => $user->id,
            'letter_type_id' => $aktifKuliah->id,
            'file_path' => '/submission/file/1.pdf',
            'status' => 'canceled'
        ]);

        LetterSubmission::create([
            'user_id' => $user->id,
            'letter_type_id' => $aktifKuliah->id,
            'file_path' => '/submission/file/1.pdf',
            'status' => 'approved'
        ]);

        LetterSubmission::create([
            'user_id' => User::latest()->first()->id,
            'letter_type_id' => $aktifKuliah->id,
            'file_path' => '/submission/file/1.pdf',
            'status' => 'rejected'
        ]);
        
    }
}
