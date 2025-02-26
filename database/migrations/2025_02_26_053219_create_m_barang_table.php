<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('kode_barang', 50)->unique();
            $table->string('nama_barang', 100);
            $table->decimal('harga', 10, 2);
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('m_barang');
    }
};
