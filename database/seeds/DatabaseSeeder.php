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
//        factory(\App\socialNetwork::class, 1) -> create();
        \Illuminate\Database\Eloquent\Model::unguard();

        $this->call([socialNetworksTableSeeder::class,
        pagesTableSeeder::class,
        ]);

    }

}