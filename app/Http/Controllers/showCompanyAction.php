<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class showCompanyAction extends Controller
{
    public function __invoke(CommentRequest $request, $id)
    {
        if ($request->method() == 'POST') {

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
