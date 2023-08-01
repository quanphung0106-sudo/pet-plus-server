<?php

namespace Database\Seeders;

use App\Models\DifficultyLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $difficultyLevels = [
            ['difficulty_level_name' => 'Độ khó 1'],
            ['difficulty_level_name' => 'Độ khó 2'],
            ['difficulty_level_name' => 'Độ khó 3'],
            ['difficulty_level_name' => 'Độ khó 4'],
            ['difficulty_level_name' => 'Độ khó 5'],
            ['difficulty_level_name' => 'Độ khó 6'],
            ['difficulty_level_name' => 'Độ khó 7'],
            ['difficulty_level_name' => 'Độ khó 8'],
            ['difficulty_level_name' => 'Độ khó 9'],
            ['difficulty_level_name' => 'Độ khó 10'],
        ];

        foreach ($difficultyLevels as $difficultyLevel) {
            DifficultyLevel::create($difficultyLevel);
        }
    }
}
