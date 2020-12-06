<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_tag')->nullable();
            $table->string('email');
            $table->text('address');
            $table->string('phone');
            $table->string('favicon')->default('backend/img/website/favicon.png');
            $table->string('logo')->default('backend/img/website/default.png');
            $table->text('twitter_api')->nullable();
            $table->text('google_map')->nullable();
            $table->text('icon')->nullable();
            $table->text('link')->nullable();
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
        Schema::dropIfExists('websites');
    }
}
