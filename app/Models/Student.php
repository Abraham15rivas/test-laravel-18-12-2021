<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $table = 'students';

    protected $fillable = [
        'id',
        'email',
        'password'
    ];

    public function lessons() 
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps();
    }
}
