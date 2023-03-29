<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Option extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['option_text','option_number','question_id'];


    public function options_question(){

        $this->hasOne('App\Model\Question','id','question_id');
}

}
