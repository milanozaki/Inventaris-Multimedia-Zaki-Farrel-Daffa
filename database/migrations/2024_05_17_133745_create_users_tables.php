<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table= 'users';
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_users',true,false)->nullable(false);
            $table->string('username',200)->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->string('no_hp')->nullable(false);
            $table->string('nisn')->nullable(false);
            $table->integer('id_roles',false,false)->index('idRoles')->nullable(false);
            $table->timestamps();

            $table->foreign('id_roles','ConstraintIdRole')->on('roles')->references('id_roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
