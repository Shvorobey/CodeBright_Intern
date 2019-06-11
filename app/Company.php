<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function emplotees ()
    {
        return $this -> hasMany(Employee::class);
    }
}
