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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kategori
            $table->string('icon')->nullable();
            $table->string('slug')->unique(); // URL slug unik untuk kategori
            $table->text('description')->nullable(); // Deskripsi kategori 
            $table->boolean('is_active')->default(true); // Status aktif/non-aktif
            $table->softDeletes(); //hapus
            $table->timestamps(); // created_at dan updated_at otomatis 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
