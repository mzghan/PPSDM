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
        Schema::create('posting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('unit');
            $table->string('posisi');
            $table->string('nik'); 
            $table->string('nim'); 
            $table->string('universitas_sekolah'); 
            // $table->string('alamat_universitas_sekolah'); 
            $table->string('tingkatan'); 
            $table->string('jurusan'); 
            $table->text('durasi');
            $table->text('tujuan_magang');
            $table->text('ilmu_yang_dicari');
            $table->text('output_setelah_magang');
            $table->string('proposal'); 
            $table->string('surat_pendukung'); 
            $table->string('jenis');
            $table->string('status')->default('Proccess');
            $table->text('keterangan')->nullable();
            $table->string('berkas')->nullable();
            $table->string('pegawai')->nullable();
            $table->string('lapstatus')->default('Proccess');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posting');
    }
};
