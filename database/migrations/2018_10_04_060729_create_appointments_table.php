<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_id');
            $table->string('doctor_id');
            $table->string('patient_id');
            $table->string('status')->nullable();
            $table->text('message')->nullable();
            $table->text('date');
            $table->text('time');
            $table->text('purpose');
            $table->text('diagnosis')->nullable();
            $table->text('report_id');
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
        Schema::dropIfExists('appointments');
    }
}
