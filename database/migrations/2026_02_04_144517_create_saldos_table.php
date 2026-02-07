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
    Schema::create('saldos', function (Blueprint $table) {
        $table->id();
        $table->string('entities')->nullable();
        $table->foreignId('tagihan_id')->nullable()->constrained('tagihans')->onDelete('cascade');
        $table->integer('saldo');
        $table->enum('tipe', ['pemasukan','pengeluaran']);
        $table->enum('jenis', ['kegiatan','sosial','pengembangan sekolah'])->default('kegiatan')->nullable();
        $table->text('keterangan');
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::dropIfExists('saldos');
}
};
