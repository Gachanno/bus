<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('login'); 
            $table->string('email')->unique(); 
            $table->string('password'); 
            $table->string('avatar')->nullable(); 
            $table->boolean('is_admin')->default(false);
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
