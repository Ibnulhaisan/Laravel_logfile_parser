<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname', 'email', 'password','repassword'];
}