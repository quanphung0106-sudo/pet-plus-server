<?php

namespace Database\Seeders;

use App\Models\ExerciseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exerciseTypes = [
            ['exercise_type_name' => 'Trắc nghiệm'],
            ['exercise_type_name' => 'Tự luận'],
        ];

        foreach ($exerciseTypes as $exerciseType) {
            ExerciseType::create($exerciseType);
        }
    }
}
