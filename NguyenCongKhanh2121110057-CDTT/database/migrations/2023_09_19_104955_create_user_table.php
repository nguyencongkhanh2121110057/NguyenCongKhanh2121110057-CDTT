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
        Schema::create('nck_user', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('email',1000);
            $table->string('phone',1000);
            $table->string('username',1000);
            $table->string('password',1000);
            $table->string('address',1000);
            $table->string('image',1000);
            $table->string('roles',1000);
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('status')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nck_user');
    }
};
