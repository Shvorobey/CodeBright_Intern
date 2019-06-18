<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
