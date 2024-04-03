<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progreso_usuarios extends Model
{
    use HasFactory;
    public function progresable()
    {
        return $this->morphTo();
    }
}
