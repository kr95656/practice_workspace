<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecondaryKind extends Model
{
    public function primaryKind()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }
}
