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
        <img class="card-img-top" src=https://tudoy-sudoy.od.ua/wp-content/uploads/2018/02/karta-odessa-old-3.jpg width="300" height="600" alt="Card image cap">
        ',
        ]);
    }
}
