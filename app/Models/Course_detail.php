<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_detail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['course_name','course_code'];
}

