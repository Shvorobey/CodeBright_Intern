<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;

class deleteCompanyAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $company = \App\Company::FindOrFail($request->input('id'));
        foreach ($company->employees as $employe) {
            $employe->positions->delete();
            $employe->delete();
        }
        $user = User::where('id', $company->user_id)->first();
        $company->delete();
        $user->delete();

        return redirect()->route('index');
    }
}
