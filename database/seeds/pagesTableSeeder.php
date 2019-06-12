<?php

use Illuminate\Database\Seeder;

class pagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'key' => 'about',
            'text' => 'Увлекательное описание нашей компании. <br>
            У нас замечательная история, <br>
            мы стремительно развиваемся. <br>
            Все работники нашей компании <br>
            отъявленные профессионалы своего дела. <br>
        Мы самые лучшие и нет лучше нас.',
        ]);

        DB::table('pages')->insert([
            'key' => 'contact',
            'text' => '<li>Телефон: +38 067 ххх-хх-хх </li> 
        <li>Email: ХХХХХХ.office@gmail.com</li>
        <li>Адрес: г. Одесса, ул. Такая-то, 7 </li> 
        <li>Telegram: XXXXXXXXXX </li>
        <li>Как нас найти: </li>
        <img class="card-img-top" src=https://img-fotki.yandex.ru/get/6100/97833783.ce4/0_12bbef_9992349b_XXXL.jpg width="300" height="600" alt="Card image cap">
        ',
        ]);
    }
}
