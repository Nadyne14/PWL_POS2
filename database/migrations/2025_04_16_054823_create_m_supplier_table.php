<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id('supplier_id'); // ID unik untuk setiap supplier
            $table->string('supplier_name', 100); // Nama supplier
            $table->string('contact_person', 100)->nullable(); // Nama kontak yang bisa dihubungi (opsional)
            $table->string('phone_number', 15)->nullable(); // Nomor telepon (opsional)
            $table->string('email', 100)->nullable(); // Email supplier (opsional)
            $table->text('address')->nullable(); // Alamat lengkap (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_supplier');
    }
}