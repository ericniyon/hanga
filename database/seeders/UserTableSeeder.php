<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Super Admin','email'=> 'admin@ihuzo.rw','is_superadmin'=>true,'password' => Hash::make('password')],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email'=> 'admin@ihuzo.rw'], $user);
        }
    }
}
