<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('m_kategori', function (Blueprint $table) {
            $table->string('kode_kategori', 50)->unique()->after('id');
        });
    }

    public function down(): void {
        Schema::table('m_kategori', function (Blueprint $table) {
            $table->dropColumn('kode_kategori');
        });
    }
};
