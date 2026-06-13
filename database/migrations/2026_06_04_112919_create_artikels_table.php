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
         Schema::create('artikel', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('id_penulis');
        $table->unsignedBigInteger('id_kategori');

        $table->string('judul', 255);
        $table->longText('isi');

        $table->string('gambar')->nullable();

        $table->date('hari_tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
