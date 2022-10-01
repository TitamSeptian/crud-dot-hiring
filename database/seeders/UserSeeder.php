<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ujang',
                'email' => 'ujang@ujang.com',
                'password' => bcrypt('123qwe123'),
            ],
            [
                'name' => 'Asep',
                'email' => 'asep@asep.com',
                'password' => bcrypt('123qwe123'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
