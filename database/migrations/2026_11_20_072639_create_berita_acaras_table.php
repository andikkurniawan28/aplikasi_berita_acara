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
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('dokumen_id')->constrained();
            $table->string('nomor_dokumen')->unique();
            $table->string('kepada');
            $table->string('dari');
            $table->string('perihal');
            $table->text('redaksi');
            $table->foreignId('kasus_id')->constrained();
            $table->string('kronologi');
            $table->string('nopol');
            $table->foreignId('jenis_kendaraan_id')->constrained();
            $table->foreignId('material_id')->constrained();
            $table->string('no_spta')->nullable();
            $table->string('no_timbangan')->nullable();
            $table->string('no_do')->nullable();
            $table->string('pengangkut')->nullable();
            $table->date('tanggal_masuk_awal');
            $table->float('bruto_awal');
            $table->float('tarra_awal');
            $table->float('netto_awal');
            $table->float('rafaksi_awal');
            $table->float('netto_setelah_rafaksi_awal');
            $table->date('tanggal_masuk_koreksi');
            $table->float('bruto_koreksi');
            $table->float('tarra_koreksi');
            $table->float('netto_koreksi');
            $table->float('rafaksi_koreksi');
            $table->float('netto_setelah_rafaksi_koreksi');
            $table->text('penutup');
            $table->date('tanggal_dokumen');
            $table->string('menyetujui');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
