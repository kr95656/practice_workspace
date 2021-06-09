<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrimaryKind extends Model
{
    public function secondaryKinds()
    {
        return $this->hasMany(SecondaryKind::class);
    }
}
