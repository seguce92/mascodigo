<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)
            ->times(1)
            ->create([
                'fullname'  =>  'Sergio Gualberto Cruz Espinoza',
                'email'     =>  'seguce92@gmail.com',
                'password'  =>  bcrypt('secret')
            ]);
    }
}
