<?php

namespace Database\Seeders;

use App\Models\PublicType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['public_type_name' => 'Public'],
            ['public_type_name' => 'Pending'],
            ['public_type_name' => 'Public in Enterprise'],
            ['public_type_name' => 'Private'],
        ];

        foreach ($types as $type) {
            PublicType::create($type);
        }
    }
}
