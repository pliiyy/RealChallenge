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
        Schema::create('semester', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("kode");
            $table->string("keterangan");
            $table->string("tahun_akademik");
            $table->enum("tipe",["GANJIL","GENAP","KHUSUS"]);
            $table->enum("status",["AKTIF","NONAKTIF"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester');
    }
};
