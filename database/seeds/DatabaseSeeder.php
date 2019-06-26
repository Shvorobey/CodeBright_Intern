<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();

        factory(\App\Company::class, 49)->create();
        factory(\App\Employee::class, 200)->create();
        factory(\App\Position::class, 200)->create();
        factory(\App\Comment::class, 200)->create();
        factory(\App\User::class, 50)->create();
    }
}