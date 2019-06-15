<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employees ()
    {
        return $this -> hasMany(Employee::class);
    }

    public function comments ()
    {
        return $this -> hasMany(Comment::class);
    }

    public function users ()
    {
    return$this -> belongsTo(User::class);
    }

//    public function getRandomCompanyId() {
//        $company = \App\Company::inRandomOrder()->first();
//        return $company->id;
//    }
}
