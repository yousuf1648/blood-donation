<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeforeregistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beforeregistration', function (Blueprint $table) {
            $table->id();
            $table->string('weight',50);
            $table->string('age',50);
            $table->string('height',50);
            $table->string('disease',100);
            $table->string('smoker',50);
            $table->string('marital_status',100);
            $table->string('key',100);
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
        Schema::dropIfExists('beforeregistration');
    }
}
