<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Agiel Nugraha',
            'email' => 'agielnara17@gmail.com',
            'photo' => 'img/profile/default.png',
        ]);
    }
}
