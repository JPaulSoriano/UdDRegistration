<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reg_ref');
            $table->string('year');
            $table->string('semester');
            $table->enum('status', [0, 1])->default(0);
            $table->enum('status_admission', [0, 1])->default(0);
            $table->enum('status_enrollment', [0, 1])->default(0);
            $table->string('stud_type');
            $table->string('stud_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->foreignId('course_id');
            $table->string('year_level');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('last_school');
            $table->string('payment_method')->nullable();
            $table->string('payment_ref')->nullable()->unique();
            $table->string('image')->nullable();
            $table->string('auth_first_name')->nullable();
            $table->string('auth_last_name')->nullable();
            $table->string('auth_middle_name')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
