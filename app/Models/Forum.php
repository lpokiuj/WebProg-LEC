<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'forumID');
    }

    public function objectives()
    {
        return $this->hasMany(Objective::class, 'forumID');
    }
}
