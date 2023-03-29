<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table='test_table';

    protected $fillable = ['name','address','phone'];

}

//$var = new TestModel([
//    'name' => 'John',
//    'phone' => '01961974792',
//    'address' => 'khulna',
//
//    //'password' => bcrypt('password'),
//]);
//test_table::create($var->toArray());
