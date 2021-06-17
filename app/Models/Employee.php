<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

// class Employee extends Model
// {
//     //
// }


class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'prefecture',
        'city',
        'street',
        'memo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registeredItems ()
    {
        return $this->hasMany(Item::class, 'employee_id');
    }

    public function customers ()
    {
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    public function customersLog ()
    {
        return $this->hasMany(CustomerLog::class);
    }
}
