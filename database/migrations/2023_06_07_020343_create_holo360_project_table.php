<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolo360ProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holo360_project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->integer('id_priority')->nullable();
            $table->unsignedBigInteger('category_holo360_id')->nullable();
            $table->foreign('category_holo360_id')->references('id')->on('category_holo360')->onDelete('cascade');
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
        Schema::dropIfExists('holo360_project');
    }
}
