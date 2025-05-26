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
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY, AUTO_INCREMENT
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key ke tabel users
            $table->string('original_filename');
            $table->string('stored_filename')->unique(); // Nama file unik di storage
            $table->string('file_path'); // Path atau URL ke file di storage
            $table->string('file_mime_type')->nullable(); // Tipe MIME file
            $table->unsignedBigInteger('file_size')->nullable(); // Ukuran file dalam bytes
            $table->text('description')->nullable(); // Deskripsi opsional
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};