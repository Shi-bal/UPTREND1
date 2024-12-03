<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistTable extends Migration
{
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
}
