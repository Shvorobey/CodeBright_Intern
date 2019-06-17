<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'user_id', 'key',
    ];

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

}
