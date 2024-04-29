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
        Schema::disableForeignKeyConstraints();

        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requesting_id');
            $table->foreign('requesting_id')->references('id')->on('users');
            $table->unsignedBigInteger('issue_id');
            $table->foreign('issue_id')->references('id')->on('users');
            $table->timestamp('request_date');
            $table->timestamp('return_date');
            $table->unsignedBigInteger('clinic_history_id');
            $table->foreign('clinic_history_id')->references('id')->on('clinic_history');
            $table->string('reason');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
