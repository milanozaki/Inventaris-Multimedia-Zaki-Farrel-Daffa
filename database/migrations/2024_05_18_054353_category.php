<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table='category';
    public function up(): void
    {
        //
        Schema::create('category', function (Blueprint $table) {
            $table->integer('id_category',true,false)->nullable(false);
            $table->string('nama',60)->nullable(false);
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('category');
    }
};
