<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table='stok';
    public function up(): void
    {
        //
        Schema::create('stok',function (Blueprint $table){
            $table->integer('id_stok',true,false)->nullable(false);
            $table->integer('id_alat',false,false)->index('idAlatStok')->nullable(false);
            $table->integer('jumlah',false,false)->nullable(false)->default(0);
            $table->timestamps();

            $table->foreign('id_alat')->on('alat')->references('id_alat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('stok');
    }
};
