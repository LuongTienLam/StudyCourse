<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('class_id')->nullable();

            $table->string('fullname');
            $table->date('birthday')->nullable();
            $table->string('email');
            $table->string('phone');

            $table->decimal('amount', 12, 2)->default(0);

            $table->string('payment_status')->default('pending');
            $table->string('payment_note')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}