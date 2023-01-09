<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forums()
    {
        return $this->hasMany(Forum::class, 'courseID');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students', 'courseID', 'userID');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_teachers', 'courseID', 'userID');
    }

    public function scopeWithSearch(Builder $query, $search)
    {
        if(!is_null($search)){
            return $query->where('name', 'LIKE', '%'.$search.'%');
        }

        return $query;
    }
}
