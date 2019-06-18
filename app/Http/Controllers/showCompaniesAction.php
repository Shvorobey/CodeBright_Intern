<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class showCompaniesAction extends Controller
{
    public function __invoke(Request $request)
    {
        return view('index', ['companies' => \App\Company::paginate(5)]);
    }
}
