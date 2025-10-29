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
    Schema::create('products', function (Blueprint $table) {
        $table->bigIncrements('id'); // Primary Key
        $table->string('name'); // Nama produk
        $table->integer('price'); // Harga produk
        $table->text('description'); // Deskripsi produk
        $table->timestamps(); // created_at & updated_at (default Laravel)
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
