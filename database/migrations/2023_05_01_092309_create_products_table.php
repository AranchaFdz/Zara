<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->float('price', 10, 2);
            $table->unsignedBigInteger('brand_id')->length(20)->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
