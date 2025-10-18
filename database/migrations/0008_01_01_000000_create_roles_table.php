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
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosen')->nullable();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->nullable();
            $table->foreignId('dekan_id')->constrained('dekan')->nullable();
            $table->foreignId('kosma_id')->constrained('kosma')->nullable();
            $table->foreignId('sekprodi_id')->constrained('sekprodi')->nullable();
            $table->foreignId('kaprodi_id')->constrained('kaprodi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
