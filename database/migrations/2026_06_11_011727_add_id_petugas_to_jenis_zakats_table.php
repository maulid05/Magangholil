<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jenis_zakats', function (Blueprint $table) {

            $table->foreignId('id_petugas')
                ->nullable()
                ->after('id')
                ->constrained('users')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('jenis_zakats', function (Blueprint $table) {

            $table->dropForeign(['id_petugas']);
            $table->dropColumn('id_petugas');

        });
    }
};
