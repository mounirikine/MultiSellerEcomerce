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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->default('Inconnu')->comment('The name of the product');
            $table->text('description')->nullable()->comment('A brief description of the product');
            $table->string('image')->nullable()->comment('Path to the product image');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade');
            $table->decimal('price', 10, 2)->nullable()->comment('The current price of the product');
            $table->decimal('old_price',10, 2)->nullable()->comment('The previous price of the product');
            $table->integer('rating')->default(1)->comment('The rating of the product, default is 1');
            $table->integer('quantity')->nullable()->comment('The quantity of the product available');
            $table->string('status')->default('available')->comment('The availability status of the product');
            $table->foreignId('seller_id')->nullable()->constrained('users')->onDelete('set null')->comment('The ID of the seller who added the product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
