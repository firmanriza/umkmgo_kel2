<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['daring', 'luring']);
            $table->foreignId('kategori_umkm_id')->constrained('kategori_umkms')->onDelete('cascade');
            $table->enum('field', ['marketing', 'produksi', 'service']);
            $table->enum('level', ['expert', 'intermediate', 'beginner']);
            $table->string('video_url')->nullable(); // for daring classes
            $table->text('schedule_info')->nullable(); // for luring classes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
}
