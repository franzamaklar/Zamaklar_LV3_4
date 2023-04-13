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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('clanovi');
            $table->string('naziv_projekta');
            $table->string('opis_projekta');
            $table->bigInteger('cijena_projekta');
            $table->string('obavljeni_poslovi');
            $table->string('datum_pocetka');
            $table->string('datum_zavrsetka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
