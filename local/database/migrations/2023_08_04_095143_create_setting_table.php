<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('news_keywords', 255)->nullable();
            $table->string('site_name', 255)->nullable();
            $table->string('locale', 255)->nullable();
            $table->string('fb_app_id', 255)->nullable();
            $table->string('pages', 255)->nullable();
            $table->string('short_icon', 255)->nullable();
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
        Schema::dropIfExists('setting');
    }
}
