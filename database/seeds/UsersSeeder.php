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
            'email' => 'sameh.omar@fatwa.com',
        ],[
            'name' => 'Sameh Omar',
            'password' => bcrypt('01013919288'),
            'user_type' => 0
        ]);

        // 2nd Admin
        User::updateOrCreate([
            'email' => 'faten.farouk@fatwa.com',
        ],[
            'name' => 'فاتن فاروق',
            'password' => bcrypt('180938'),
            'user_type' => 0
        ]);

        // 3rd Admin
        User::updateOrCreate([
             'email' => 'nadia.metwally@fatwa.com',
        ],[
            'name' => 'المشرف العام',
            'password' => bcrypt('1232'),
            'user_type' => 0
        ]);

        // 4th Admin
        User::updateOrCreate([
            'email' => 'hoda.hamza@fatwa.com',
        ],[
            'name' => 'هدى حمزه',
            'password' => bcrypt('hoda121@'),
            'user_type' => 0
        ]);

        // 5th Admin
        User::updateOrCreate([
            'email' => 'shimaa.salman@fatwa.com',
        ],[
            'name' => 'شيماء سلمان',
            'password' => bcrypt('29121984'),
            'user_type' => 0
        ]);

        // 6th Admin
        User::updateOrCreate([
            'email' => 'amal.mohamed@fatwa.com',
        ],[
            'name' => 'امل المنيري',
            'password' => bcrypt('11750'),
            'user_type' => 0
        ]);

        // 7th Admin
        User::updateOrCreate([
            'email' => 'gehad.mohamed@fatwa.com',
        ],[
            'name' => 'جهاد محمد',
            'password' => bcrypt('7863161161'),
            'user_type' => 0
        ]);
        
         // 8th Admin
        User::updateOrCreate([
            'email' => 'sehamdess@gmail.com',
        ],[
            'name' => 'سهام دسوقي',
            'password' => bcrypt('Kassab92'),
            'user_type' => 0
        ]);
        
    }
}
