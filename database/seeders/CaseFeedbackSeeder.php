<?php

namespace Database\Seeders;

use App\Models\CaseFeedback;
use App\Models\CaseRecord;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caseRecords = CaseRecord::all();
        $users = User::all();
        $types = ['like', 'dislike'];

        foreach ($caseRecords as $caseRecord) {
            for ($i = 0; $i < $caseRecord->frequency; $i++) {
                CaseFeedback::create([
                    'case_record_id' => $caseRecord->id,
                    'user_id' => $users[fake()->numberBetween(4, 5)]->id,
                    'type' => fake()->randomElement($types),
                ]);
            }
        }
    }
}
