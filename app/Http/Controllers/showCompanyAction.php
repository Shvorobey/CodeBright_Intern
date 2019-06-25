<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class showCompanyAction extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'description' => 'required | max: 1000 | string ',
                'image' => 'image | dimensions: min_width=200, min_height=500 | file',
            ]);
            $company = Company::find($request->input('id'));
            $company->description = $request->input('description');

            $image = $request->image;
            if ($image) {
                $imageName = $image->getClientOriginalName();
                $image->move('images', $imageName);
                $company->image = 'http://Outher_company/images/' . $imageName;
            }
            $company->save();

        } else {
            $company = Company::where('id', $id)->first();
        }
        return view('company', ['company' => $company]);
    }
}
