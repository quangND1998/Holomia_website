<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('favicon')->nullable();
            $table->string('model_code');
            $table->string('slug')->nullable();
            $table->boolean('active')->default(true)->nullable();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('category_scan_id')->unsigned();
            $table->foreign('category_scan_id')->references('id')->on('category_scans');
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('logo')->nullable();
            $table->date('expired_date')->nullable();
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
        Schema::dropIfExists('scans');
    }
}
