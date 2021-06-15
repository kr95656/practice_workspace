<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function employees ()
    {
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }

}
