<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('id_unit');
            $table->string('unit');
            $table->string('posisi');
            $table->text('timeline');
            $table->text('durasi');
            $table->string('tingkatan');
            $table->string('jenis_pendaftaran');
            $table->string('jurusan');
            $table->text('desk_pekerjaan');
            $table->string('status')->default('Diajukan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
}

