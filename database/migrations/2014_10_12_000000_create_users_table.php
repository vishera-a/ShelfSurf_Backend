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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Ime', 30);
            $table->string('Prezime', 30);
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('Telefon', 30);
            $table->string('Adresa1', 50);
            $table->string('Adresa2', 50)->nullable();
            $table->unsignedBigInteger('IzdavacID')->default(0);
            $table->integer('IsAdmin')->default(0);
            $table->integer('IsMod')->default(0);
            $table->integer('IsDeleted')->default(0);
        });

        Schema::create('autor', function (Blueprint $table) {
            $table->id('AutorID');
            $table->string('Ime', 30);
            $table->string('Prezime', 30);
            $table->string('Biografija', 2000);
            $table->integer('IsDeleted')->default(0);
        });

        Schema::create('izdavac', function (Blueprint $table) {
            $table->id('IzdavacID');
            $table->unsignedBigInteger('id');
            $table->string('Naziv', 30);
            $table->integer('IsDeleted', 0);
        });
        
        Schema::create('kategorija', function (Blueprint $table) {
            $table->id('KategorijaID');
            $table->string('Naziv', 50);
        });

        Schema::create('knjiga', function (Blueprint $table) {
            $table->id('KnjigaID');
            $table->string('Naziv', 50);
            $table->unsignedBigInteger('KategorijaID');
            $table->float('Cena');
            $table->integer('Stanje');
            $table->string('Slika');
            $table->unsignedBigInteger('IzdavacID');
            $table->integer('IsDeleted')->default(0);
            
            $table->foreign('IzdavacID')->references('IzdavacID')->on('izdavac');
            $table->foreign('KategorijaID')->references('KategorijaID')->on('kategorija');
        });

        Schema::create('autoriKnjige', function (Blueprint $table) {
            $table->id('AutoriKnjigeID');
            $table->unsignedBigInteger('KnjigaID');
            $table->unsignedBigInteger('AutorID');

            $table->foreign('KnjigaID')->references('KnjigaID')->on('knjiga');
            $table->foreign('AutorID')->references('AutorID')->on('autor');
        });

        Schema::create('porudzbina', function (Blueprint $table) {
            $table->id('PorudzbinaID');
            $table->unsignedBigInteger('id');
            $table->dateTime('Datum');
            $table->float('KonacnaCena');

            $table->foreign('id')->references('id')->on('users');
        });

        Schema::create('stavkaPorudzbine', function (Blueprint $table) {
            $table->id('StavkePorudzbineID');
            $table->unsignedBigInteger('PorudzbinaID');
            $table->unsignedBigInteger('KnjigaID');
            $table->integer('Kolicina');
            $table->float('UkupnaCena');
            
            $table->foreign('PorudzbinaID')->references('PorudzbinaID')->on('porudzbina');
            $table->foreign('KnjigaID')->references('KnjigaID')->on('knjiga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('autor');
        Schema::dropIfExists('knjiga');
        Schema::dropIfExists('autoriKnjige');
        Schema::dropIfExists('porudzbina');
        Schema::dropIfExists('stavkaPorudzbine');
    }
};
