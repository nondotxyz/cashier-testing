<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('cashier', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telepon');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->foreignId('sales_by')->constrained('cashier');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::create('sales_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('sub_total');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier');
        Schema::dropIfExists('sales');
        Schema::dropIfExists('product');
        Schema::dropIfExists('sales_detail');
    }
};
