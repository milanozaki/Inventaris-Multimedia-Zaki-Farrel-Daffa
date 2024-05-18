<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table='peminjaman';
    public function up(): void
    {
        //
        Schema::create('peminjaman',function (Blueprint $table){
            $table->integer('id_peminjaman',true,false)->nullable(false);
            $table->integer('id_users',false,false)->index('idUserPeminjaman')->nullable(false);
            $table->integer('id_alat',false,false)->index('idAlatPeminjaman')->nullable(false);
            $table->dateTime('tanggal_peminjaman')->nullable(true);
            $table->dateTime('tanggal_pengembalian')->nullable(true);
            $table->integer('jumlah_alat')->nullable(false);
            $table->timestamps();

            $table->foreign('id_alat')->on('alat')->references('id_alat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_users')->on('users')->references('id_users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('peminjaman');
    }
};
