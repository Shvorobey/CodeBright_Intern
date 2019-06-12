<?php

use Illuminate\Database\Seeder;

class socialNetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\socialNetwork::create([
            'url' => 'https://www.facebook.com',
            'name' => 'Мы в Facebook',
        ]);
        \App\socialNetwork::create([
            'url' => 'https://twitter.com',
            'name' => 'Мы в Twitter',
        ]);
        \App\socialNetwork::create([
            'url' => 'https://www.instagram.com',
            'name' => 'Мы в Instagram',
        ]);

    }
}
