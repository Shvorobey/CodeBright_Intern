<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function emplotees ()
    {
        return $this -> hasMany(Employee::class);
    }

    public function comments ()
    {
        return $this -> hasMany(Comment::class);
    }
}
