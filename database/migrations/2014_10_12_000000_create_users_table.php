<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->string('donor_id',100);
            $table->integer('is_donor')->default('0');
            $table->string('name',100);
            $table->string('username',100)->unique();
            $table->string('email',100)->unique();
            $table->string('weight',50)->nullable();
            $table->string('age',50)->nullable();
            $table->string('height',50)->nullable();
            $table->string('disease',100)->nullable();
            $table->string('smoker',50)->nullable();
            $table->string('marital_status',100)->nullable();
            $table->string('blood_group',200)->nullable();
            $table->string('birthday',100)->nullable();
            $table->string('gender',100)->nullable();
            $table->string('last_donate',100)->nullable();
            $table->string('present_address',2000)->nullable();
            $table->string('permanent_address',2000)->nullable();
            $table->string('first_mobile',20)->unique();
            $table->string('second_mobile',20)->nullable();
            $table->string('thana',100)->nullable();
            $table->string('area',100)->nullable();
            $table->string('post_code',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->integer('status')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
