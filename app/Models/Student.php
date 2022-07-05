<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'surname'
    ];

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'student_id');
    }
}
