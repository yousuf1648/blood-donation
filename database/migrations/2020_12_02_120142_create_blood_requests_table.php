<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('patient_age');
            $table->string('patient_gender');
            $table->string('blood_group');
            $table->string('blood_bag');
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_area');
            $table->string('blood_needed_date');
            $table->string('blood_needed_time');
            $table->string('patient_relative');
            $table->string('patient_relative_contact');
            $table->string('reason_for_blood');
            $table->string('report_image');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('blood_requests');
    }
}
