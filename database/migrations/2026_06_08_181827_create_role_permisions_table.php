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
        Schema::create('role_permisions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_role')
                ->constrained('roles')
                ->cascadeOnDelete();

            $table->foreignId('id_permision')
                ->constrained('permisions')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permisions');
    }
};
