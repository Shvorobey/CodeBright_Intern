<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required | max: 30 | string ',
            'last_name' => 'required | max: 30 | string ',
            'title' => 'required | max: 100 | string ',
            'salary' => 'required | numeric | string ',
        ];
    }
}
