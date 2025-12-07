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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->nullable()->constrained('mahasiswas')->nullOnDelete(); 
            $table->date('tanggal');
            $table->time('waktu_masuk');
            $table->time('waktu_keluar')->nullable();
            $table->enum('metode_absensi', ['qr_code', 'face_id']); 
            $table->string('kode_unik')->unique(); 
            $table->timestamp('kode_berlaku_hingga'); 
            $table->boolean('sudah_absen')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
