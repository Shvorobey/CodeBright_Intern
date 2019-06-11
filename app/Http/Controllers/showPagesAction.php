<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showPagesAction extends Controller
{
    public function about ()
    {
        return view('about', ['page' => \App\Page::where('key', '=', 'about')->first()]);
    }

    public function contact ()
    {
        return view('contact', ['page' => \App\Page::where('key', '=', 'contact')->first()]);
    }
}
