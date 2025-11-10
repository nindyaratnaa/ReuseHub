<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('id_role')->default(2);
            $table->string('nama', 100);
            $table->string('username', 50)->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->boolean('terms_agreed')->default(false);
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
