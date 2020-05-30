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
        // 1st Admin
        User::updateOrCreate([
            'name' => 'Sameh Omar',
            'email' => 'sameh.omar@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        // 2nd Admin
        User::updateOrCreate([
            'name' => 'فاتن فاروق',
            'email' => 'faten.farouk@fatwa.com',
            'password' => bcrypt('180938'),
            'user_type' => 0
        ]);

        // 3rd Admin
        User::updateOrCreate([
            'name' => 'نادية',
            'email' => 'nadia@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        // 4th Admin
        User::updateOrCreate([
            'name' => 'Sameh',
            'email' => 'Sameh@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        // 5th Admin
        User::updateOrCreate([
            'name' => 'Sameh',
            'email' => 'Sameh@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        // 6th Admin
        User::updateOrCreate([
            'name' => 'Sameh',
            'email' => 'Sameh@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

    }
}
