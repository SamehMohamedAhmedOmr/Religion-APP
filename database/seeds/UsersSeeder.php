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
        User::updateOrCreate([
            'name' => 'Sameh',
            'email' => 'Sameh@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        User::updateOrCreate([
            'name' => 'فاتن',
            'email' => 'faten@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        User::updateOrCreate([
            'name' => 'نادية',
            'email' => 'nadia@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        User::updateOrCreate([
            'name' => 'Sameh',
            'email' => 'Sameh@fatwa.com',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);
    }
}
