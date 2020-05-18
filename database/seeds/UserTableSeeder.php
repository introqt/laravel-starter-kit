<?php

use App\User;
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
        User::truncate();

        User::create([
            'name' => 'Nikita',
            'email' => 'nikita.kolotilo@gmail.com',
            'password' => Hash::make('qweqwe33')
        ]);
    }
}
