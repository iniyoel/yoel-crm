<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id'); // ID untuk setiap customer
            $table->string('name'); // Nama customer
            $table->enum('status', ['Active', 'Deactive', 'Payment Overdue']); // Status customer
            $table->date('next_billing_date'); // Tanggal tagihan berikutnya
            $table->enum('subscription_plan', ['Home Plan', 'Business Plan', 'TV Cable']); // Paket langganan
            $table->decimal('payment_amount', 15, 2); // Jumlah pembayaran
            $table->string('phone'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
