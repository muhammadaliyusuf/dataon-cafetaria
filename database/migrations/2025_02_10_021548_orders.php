<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID user yang memesan
            $table->foreignId('menu_id')->constrained()->onDelete('cascade'); // ID menu yang dipesan
            $table->integer('quantity'); // Jumlah pesanan
            $table->integer('unit_price'); // Harga per unit menu
            $table->integer('total_amount'); // Total harga (quantity * unit_price)
            $table->string('payment_method'); // Metode pembayaran
            $table->timestamp('order_time')->useCurrent(); // Waktu pemesanan
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
