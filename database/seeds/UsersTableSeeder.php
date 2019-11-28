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
        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->addresses()->saveMany(factory(App\Address::class,2)->make());
        });
        factory(App\Pizza::class, 30)->create();
    }
}
