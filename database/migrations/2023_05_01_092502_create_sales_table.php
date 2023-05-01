<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->integer('price_list');
            $table->unsignedBigInteger('brand_id')->length(20)->nullable();
            $table->unsignedBigInteger('product_id')->length(20)->nullable();
            $table->float('price', 10, 2);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
