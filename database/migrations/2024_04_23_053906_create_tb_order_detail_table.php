<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_order_detail', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->string('order_kode', 50);
            $table->foreign('order_kode')->references('order_kode')->on('tb_order')->onDelete('cascade');
            $table->string('produk_kode', 50);
            $table->foreign('produk_kode')->references('produk_kode')->on('tb_produk')->onDelete('cascade');
            $table->integer('detail_harga');
            $table->integer('detail_jml');
            $table->timestamp('created_at')->useCurrent();
            $table->datetime('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_order_detail');
    }
};
