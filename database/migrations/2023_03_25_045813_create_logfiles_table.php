<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logfiles', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('user_identity');
            $table->string('username_client');
            $table->string('date_time');
            $table->string('http_request');
            $table->text('url_request');
            $table->string('protocol_version');
            $table->string('status_code');
            $table->string('byte_size');
            $table->text('referrer_req');
            $table->text('user_agent');
            $table->text('cookies_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logfiles');
    }
};
