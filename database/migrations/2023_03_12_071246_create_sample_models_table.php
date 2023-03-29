<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('sample_models', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('department');
            $table->integer('salary');

            $table->timestamps();
        });

//        Schema::table('sample_models', function($table) {
//            $table->renameColumn('Category_id', 'category_id','Name','name','Department','department','Salary','salary');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sample_models');
    }
};
