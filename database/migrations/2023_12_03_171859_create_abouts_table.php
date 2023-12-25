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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('small_title')->default('Provide Best');
            $table->string('big_title')->default('Product For You');
            $table->text('description')->default('We provide the best Beard oile all over the world. We are the worldd best store in indi for Beard Oil. You can buy our product without any hegitation because they truste us and buy our product without any hagitation because they belive and always happy buy our product.

            Some of our customer say’s that they trust us and buy our product without any hagitation because they belive us and always happy to buy our product.
            
            We provide the beshat they trusted us and buy our product without any hagitation because they belive us and always happy to buy.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
