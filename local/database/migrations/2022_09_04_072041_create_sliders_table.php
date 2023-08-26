<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255)->nullable();
            $table->string('des1', 255)->nullable();
            $table->string('des2', 255)->nullable(); 
            $table->string('des3')->nullable();
            $table->integer('slider_type')->comment('1-ngang trang chủ,2 Ngang trang danh sách;3 chân trang, 4 trang chi tiết');
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
