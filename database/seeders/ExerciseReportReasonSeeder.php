<?php

namespace Database\Seeders;

use App\Models\ExerciseReportReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseReportReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exerciseReportReasons = [
            ['exercise_report_reason_name' => 'Câu bị lặp'],
            ['exercise_report_reason_name' => 'Lỗi export ra word'],
            ['exercise_report_reason_name' => 'Sai đề'],
            ['exercise_report_reason_name' => 'Sai đáp án'],
            ['exercise_report_reason_name' => 'Khiếu nại bản quyền'],
            ['exercise_report_reason_name' => 'Lý do khác'],
        ];

        foreach ($exerciseReportReasons as $exerciseReportReason) {
            ExerciseReportReason::create($exerciseReportReason);
        }
    }
}
