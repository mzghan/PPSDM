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
        Schema::create('wawancara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('nik');
            $table->string('nim');
            $table->string('universitas_sekolah');
            $table->string('alamat_universitas_sekolah');
            $table->string('tingkatan');
            $table->string('jurusan');
            $table->string('judul_penelitian');
            $table->text('tanggal');
            $table->string('pkt_integritas');
            $table->string('proposal');
            $table->string('surat_pendukung');
            $table->string('jenis');
            $table->string('status')->default('Proccess');
            $table->string('unit_kerja')->nullable()->after('status');
            $table->text('keterangan')->nullable();
            $table->string('berkas')->nullable();
            $table->string('lapstatus')->default('Proccess');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wawancara');
    }
};
