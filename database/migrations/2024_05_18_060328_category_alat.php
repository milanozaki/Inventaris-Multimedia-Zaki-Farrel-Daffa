<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table='kategori_alat';
    public function up(): void
    {
        //
        Schema::create('kategori_alat',function (Blueprint $table){
            $table->integer('id_kategori_alat',true,false)->nullable(false);
            $table->integer('id_alat',false,false)->index('idAlatCategory')->nullable(false);
            $table->integer('id_category',false,false)->index('idCategoryAlat')->nullable(false);
            $table->timestamps();

            $table->foreign('id_alat')->on('alat')->references('id_alat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_category')->on('category')->references('id_category')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('kategori_alat');
    }
};
