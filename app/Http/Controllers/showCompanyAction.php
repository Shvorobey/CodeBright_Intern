<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class showCompanyAction extends Controller
{
    public function __invoke(Request $request, $key)
    {
        $company = Company::where('key', $key)->first();

        return view('company', ['company' => $company]);
    }
}
