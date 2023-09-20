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
        Schema::create('nck_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->string('name',1000);
            $table->string('slug',1000);
            $table->float('price');
            $table->float('price_sale');
            $table->string('image',1000);
            $table->unsignedInteger('qty');
            $table->mediumText('detail');
            $table->string('metakey',255);
            $table->string('metadesc',255);
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('status')->default(2)->comment("0:Rác-1:Hiện-2:Ẩn");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nck_product');
    }
};