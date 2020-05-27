<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123456789'),
            'user_type' => 0
        ]);
    }
}
