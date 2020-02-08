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
                'photo'     =>  'https://mascodigo.app/storage/users/seguce92.jpg',
                'username'  =>  'seguce92',
                'fullname'  =>  'Sergio Gualberto Cruz Espinoza',
                'email'     =>  'sergio.cruz@mascodigo.com.bo',
                'password'  =>  bcrypt('Zurc_oigres_mascodigo_19')
            ]);

        factory(\App\Entities\Core\Information::class)
            ->times(1)
            ->create([
                'facebook'  =>  'https://www.facebook.com/seguce92.sergio',
                'youtube'   =>  'https://www.youtube.com/channel/UCvuDefISH0VG8ZM8qINLZaw',
                'twitter'   =>  'https://twitter.com/seguce92',
                'github'    =>  'https://github.com/seguce92',
                'gitlab'    =>  'https://gitlab.com/seguce',
                'portlet'   =>  'image10.jpg',
                'user_id'   =>  1
            ]);
    }
}
