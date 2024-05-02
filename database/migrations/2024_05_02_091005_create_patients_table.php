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

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('fullname');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthdate')->nullable();
            $table->enum('document_type', ["DNI", "CE", "Pasaporte"])->default('DNI');
            $table->enum('sex', ["Masculino", "Femenino"]);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('patients');
        Schema::enableForeignKeyConstraints();
    }
};
