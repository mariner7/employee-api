<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('documents')->insert([
            [
                'user_id' => 2,
                'filename' => 'CV',
                'extension' => 'pdf',
                'type' => 'PDF',
                'created_at' => DATE,
                'updated_at' => DATE
            ],
            [
                'user_id' => 2,
                'filename' => 'foto',
                'extension' => 'jpeg',
                'type' => 'jpeg',
                'created_at' => DATE,
                'updated_at' => DATE
            ]
        ]);
    }
}
