<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'AdminAccount',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'OfficerAccount',
                'email' => 'officer@gmail.com',
                'role' => 'officer',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'UserAccount',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345678')
            ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
