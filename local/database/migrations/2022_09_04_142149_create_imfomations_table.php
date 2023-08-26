<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imfomations', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 255)->nullable();
            $table->string('img1', 255)->nullable();
            $table->string('img2', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('slogan', 255)->nullable();
            $table->string('adress', 255)->nullable();
            $table->string('hotline', 10)->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('mail', 20)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('zalo', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->text('des1', 255)->nullable();
            $table->text('des2', 255)->nullable(); 
            $table->text('des3')->nullable();
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
        Schema::dropIfExists('imfomations');
    }
}
