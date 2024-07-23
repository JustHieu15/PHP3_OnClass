<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // php artisan migrate
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('name', 20);
            $table->float('price', 10,2)->default(800.02);
            $table->string('description', 500)->nullable();
            $table->string('image', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    // php artisan:rollback | reset
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
