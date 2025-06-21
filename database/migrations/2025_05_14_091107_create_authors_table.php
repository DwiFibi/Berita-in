<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // Nama penulis
            $table->string('email')->unique();         // Email penulis
            $table->text('bio')->nullable();           // Biografi penulis (opsional)
            $table->string('profile_image')->nullable(); // Foto profil (opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
