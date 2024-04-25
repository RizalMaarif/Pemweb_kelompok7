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
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_email', 50)->unique();
            $table->string('user_password', 100);
            $table->string('user_nama', 100);
            $table->text('user_alamat');
            $table->string('user_hp', 25);
            $table->string('user_pos', 5);
            $table->tinyInteger('user_role');
            $table->tinyInteger('user_aktif');
            $table->timestamp('created_at')->useCurrent();
            $table->datetime('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_users');
    }
};
