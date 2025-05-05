<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id('products_id');
        $table->string('nama_produk', 100);
        $table->longText('deskripsi_produk');
        $table->decimal('harga_produk', 8, 2);
        $table->string('tipe_produk', 50);
        $table->date('tanggal_aktif');
        $table->timestamp('tanggal_update_produk');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
