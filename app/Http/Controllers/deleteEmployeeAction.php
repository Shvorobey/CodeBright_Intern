<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class deleteEmployeeAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $employe = Employee::FindOrFail($request->input('id'));

        $employe->positions->delete();
        $employe->delete();

        return back();
    }
}
