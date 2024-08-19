<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('laporan_akhir', function (Blueprint $table) {
            $table->id(); // Tidak memerlukan parameter
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('status_pengumpulan', ['belum dikumpulkan', 'sudah dikumpulkan'])->default('belum dikumpulkan');
            $table->enum('status_penilaian', ['belum dinilai', 'sudah dinilai'])->default('belum dinilai');
            $table->timestamp('terakhir_diubah')->nullable();
            $table->string('unit')->nullable();
            $table->string('nik')->nullable();
            $table->string('nim')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tingkatan')->nullable();
            $table->string('posisi')->nullable();
            $table->string('universitas_sekolah')->nullable();
            $table->string('pegawai')->nullable();
            $table->text('durasi')->nullable();
            $table->string('pengumpulan_laporan');
            $table->timestamps();
    
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->float('nilai_rata_rata')->nullable();
            $table->string('hasil_nilai')->nullable();
            $table->text('kesan')->nullable();
            $table->text('saran')->nullable();
            $table->string('status')->default('Process');
            $table->text('keterangan')->nullable();

            $table->string('nomor_sertifikat')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('laporan_akhir');
    }
};
