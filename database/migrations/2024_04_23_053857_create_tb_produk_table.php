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
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('produk_id',);
            $table->unsignedBigInteger('kat_id');
            $table->foreign('kat_id')->references('kat_id')->on('tb_kategori');
            $table->string('produk_kode', 50)->unique();
            $table->string('produk_nama', 50);
            $table->integer('produk_hrg');
            $table->text('produk_keterangan');
            $table->integer('produk_stock');
            $table->text('produk_photo');
            $table->timestamp('create_at')->useCurrent();
            $table->datetime('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};
