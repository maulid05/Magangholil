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
        Schema::create('master_zakats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_jenis_zakat')
                ->constrained('jenis_zakats')
                ->cascadeOnDelete();

            $table->foreignId('id_pemberi')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('id_penerima')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Disalurkan'
            ])->default('Menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_zakats');
    }
};
