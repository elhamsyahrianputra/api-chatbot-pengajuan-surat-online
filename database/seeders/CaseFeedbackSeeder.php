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
        $caseRecord = CaseRecord::all();
        $users = User::all();
        $types = ['not_relevant', 'incomplete', 'different_situation'];

        $caseFeedback = [
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
            [
                'case_record_id' => $caseRecord[fake()->numberBetween(0,3)]->id,
                'user_id' => $users[fake()->numberBetween(4,5)]->id,
                'type' => fake()->randomElement($types),
            ],
        ];

        foreach ($caseFeedback as $item) {
            CaseFeedback::create($item);
        }
    }
}
