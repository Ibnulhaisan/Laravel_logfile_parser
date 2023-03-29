<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['question_text','question_mark','correct_option'];

    public function question_options(){
        return $this->hasMany('App\Model\option','question_id','id');
    }

}
