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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('type');
            $table->string('type_property');
            $table->string('market');
            $table->string('title');
            $table->string('slug');
            $table->string('area');
            $table->string('luas_bangunan');
            $table->string('luas_keseluruhan');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->integer('lantai');
            $table->string('sertifikat');
            $table->string('pemandangan');
            $table->string('listrik');
            $table->string('furnish');
            $table->string('air');
            $table->string('harga');
            $table->string('thumbnail')->nullable();
            $table->json('detail_thumbnail')->nullable();
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
