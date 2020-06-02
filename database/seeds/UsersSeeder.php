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
            'name' => 'المشرف العام',
            'email' => 'nadia.metwally@fatwa.com',
            'password' => bcrypt('1232'),
            'user_type' => 0
        ]);

        // 4th Admin
        User::updateOrCreate([
            'name' => 'هدى حمزه',
            'email' => 'hoda.hamza@fatwa.com',
            'password' => bcrypt('hoda121@'),
            'user_type' => 0
        ]);

        // 5th Admin
        User::updateOrCreate([
            'name' => 'شيماء سلمان',
            'email' => 'shimaa.salman@fatwa.com',
            'password' => bcrypt('29121984'),
            'user_type' => 0
        ]);

        // 6th Admin
        User::updateOrCreate([
            'name' => 'امل المنيري',
            'email' => 'amal.mohamed@fatwa.com',
            'password' => bcrypt('11750'),
            'user_type' => 0
        ]);

        // 7th Admin
        User::updateOrCreate([
            'name' => 'جهاد محمد',
            'email' => 'gehad.mohamed@fatwa.com',
            'password' => bcrypt('7863161161'),
            'user_type' => 0
        ]);
    }
}
