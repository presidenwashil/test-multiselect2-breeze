<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            $table->string('insurance_company_name');
            $table->string('insurance_policy_number');
            $table->string('primary_care_physician');
            $table->text('medical_history');
            $table->text('allergies');
            $table->text('medications');
            $table->text('family_medical_history');
            $table->string('occupation');
            $table->string('marital_status');
            $table->string('ethnicity');
            $table->string('preferred_language');
            $table->string('religion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
