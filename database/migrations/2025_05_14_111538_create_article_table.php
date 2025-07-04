<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {    
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->string('category');
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
