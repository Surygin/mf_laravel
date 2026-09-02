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
        Schema::create('requisites', function (Blueprint $table) {
            $table->id();

            $table->string('inn')->nullable();
            $table->string('rs_number')->nullable();
            $table->string('cs_number')->nullable();
            $table->string('kpp')->nullable();
            $table->string('bik')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('bank')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisites');
    }
};
