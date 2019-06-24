<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use Illuminate\Http\Request;

class employeeAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function save (Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'first_name' => 'required | max: 30 | string ',
                'last_name' => 'required | max: 30 | string ',
                'title' => 'required | max: 100 | string ',
                'salary' => 'required | numeric | string ',
            ]);
            $employee = new Employee();
            $employee->company_id = $request->input('id');
            $employee->first_name = $request->input('first_name');
            $employee->last_name = $request->input('last_name');
            $employee->save();

            $positions = new Position();
            $positions->employee_id = $employee->id;
            $positions->title = $request->input('title');
            $positions->salary = $request->input('salary');
            $positions->save();

        }
        return back();
    }

    public function update (Request $request){
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'first_name' => 'required | max: 30 | string ',
                'last_name' => 'required | max: 30 | string ',
                'title' => 'required | max: 100 | string ',
                'salary' => 'required | numeric | string ',
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

    public function delete (Request $request){
        $employe = Employee::FindOrFail($request->input('id'));

        $employe->positions->delete();
        $employe->delete();

        return back();
    }
}
