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
    Schema::create('leads', function (Blueprint $table) {
        $table->id('lead_id');
        $table->foreignId('customers_id')->constrained('customers')->onDelete('cascade');  // Menyimpan relasi dengan tabel customers
        $table->string('nama_lead', 100); // Lead Name
        $table->string('email_lead', 100); // Lead Email
        $table->string('telepon_lead', 20); // Phone Number
        $table->date('tanggal_masuk'); // Join Date (mm/dd/yyyy format)
        $table->enum('status_lead', ['Closed', 'Pending', 'Follow Up'])->default('Pending'); // Status Lead (misalnya: Closed, Pending, Follow Up)
        $table->enum('produk_tertarik', ['Home Plan', 'Business Plan', 'TV Cables']); // Product Interested (misalnya: Home Plan)
        $table->string('alamat_lead', 255);
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
