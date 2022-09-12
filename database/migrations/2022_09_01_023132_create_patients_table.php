<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patientNationality');
            $table->string('patientNric');
            $table->string('patientName');
            $table->string('patientGender');
            $table->string('patientBirthDate');
            $table->string('patientEmail');
            $table->string('sampleUniqueId');
            $table->string('sampleResults');
            $table->string('collectedDateTime');
            $table->string('effectiveDateTime');
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
        Schema::dropIfExists('patients');
    }
}
