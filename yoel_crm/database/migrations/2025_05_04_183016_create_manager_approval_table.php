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
    Schema::create('manager_approval', function (Blueprint $table) {
        $table->id('approval_id');
        $table->foreignId('lead_id')->constrained('leads')->onDelete('cascade'); 
        $table->foreignId('manager_id')->constrained('users')->onDelete('cascade');
        $table->string('status_approval', 20);
        $table->longText('komentar');
        $table->timestamp('tanggal_approval');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_approval');
    }
};
