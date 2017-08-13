<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangky', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('sodt');
            $table->string('email');
            $table->string('congviec');
            $table->string('gioitinh');
            $table->integer('id_ban')->unsigned();
            $table->foreign('id_ban')->references('id')->on('ban');
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
        Schema::dropIfExists('dangky');
    }
}
