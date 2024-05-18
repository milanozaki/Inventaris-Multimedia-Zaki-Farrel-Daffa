<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table='alat';
    public function up(): void
    {
        //
        Schema::create('alat',function (Blueprint $table){
            $table->integer('id_alat',true,false)->nullable(false);
            $table->string('nama_alat',200)->nullable(false);
            $table->string('kode_alat',100)->nullable(false);
            $table->enum('status',['buruk','bagus'])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('alat');
    }
};
