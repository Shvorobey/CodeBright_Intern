<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use Illuminate\Http\Request;

class updateEmployeeAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'first_name' => 'required | max: 30 | string ',
                'last_name' => 'required | max: 30 | string ',
                'title' => 'required | max: 100 | string ',
                'salary' => 'required | integer | string ',
            ]);
            $employee = Employee::find($request->input('id'));
            $employee->first_name = $request->input('first_name');
            $employee->last_name = $request->input('last_name');
            $positions = Position::where('employee_id', $request->input('id'))->first();
            $positions->title = $request->input('title');
            $positions->salary = $request->input('salary');

            $employee->save();
            $positions->save();

        }
        return back();
    }
}
