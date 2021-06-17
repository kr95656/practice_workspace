<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerLog extends Model
{

    protected $fillable = ['log', 'customer_id', 'employee_id'];

    public function customer ()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
