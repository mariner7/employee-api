<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('DATE', date('Y-m-d H:i:s'));


        DB::table('users')->insert([
            [
                'name' => 'Juan',
                'lastname' => 'Domínguez',
                'email' => 'juan@email.com',
                'username' => 'admin1',
                'password' => 'password',
                'is_admin' => 1,
                'is_active' => 1,
                'created_at' => DATE,
                'updated_at' => DATE
            ],
            [
                'name' => 'Pedro',
                'lastname' => 'Suárez',
                'email' => 'pedro@email.com',
                'username' => 'user22',
                'password' => 'password',
                'is_admin' => 0,
                'is_active' => 1,
                'created_at' => DATE,
                'updated_at' => DATE
            ]
        ]);
    }
}
