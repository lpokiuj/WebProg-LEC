<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'objectiveID');
    }
}
