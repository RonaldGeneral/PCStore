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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', total: 10, places: 2);
            $table->text('description')->nullable();
            $table->tinyInteger('status');
            $table->decimal('total_rating', total: 2, places: 1)->default(0);
            $table->string('img_src1')->nullable();
            $table->string('img_src2')->nullable();
            $table->string('img_src3')->nullable();
            $table->string('category');
        });

        Schema::create('category_attribute', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('category');
            $table->unsignedInteger('sort');
        });

        Schema::create('product_attribute', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('value');
            $table->text('description');

            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('attribute_id')->references('id')->on('category_attribute');
            $table->primary(['product_id', 'attribute_id']);
        });

        Schema::create('position', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('birthdate')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('gender', length: 1)->nullable();
            $table->text('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('username');
            $table->binary('password', length: 64);
            $table->tinyInteger('status');
            $table->timestamp('created_on')->nullable();
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->string('fpx_bank_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('tng_number')->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('status');
            $table->timestamp('created_on')->nullable();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->decimal('subtotal', total: 10, places: 2);
            $table->decimal('total', total: 10, places: 2);
            $table->decimal('delivery_fee', total: 4, places: 2);
            $table->tinyInteger('status');
            $table->timestamp('created_on')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_id');
 
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('payment_id')->references('id')->on('payment');
        });

        Schema::create('order_item', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price', total: 10, places: 2);
            $table->decimal('subtotal', total: 10, places: 2);
            $table->decimal('rating', total: 2, places: 1)->nullable();
            $table->tinyInteger('status');
 
            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('product_id')->references('id')->on('product');
            $table->primary(['order_id', 'product_id']);
        });

        Schema::create('cart_item', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price', total: 10, places: 2);
            $table->decimal('subtotal', total: 10, places: 2);
            $table->timestamp('created_on')->nullable();
 
            $table->foreign('customer_id')->references('id')->on('order');
            $table->foreign('product_id')->references('id')->on('product');
            $table->primary(['customer_id', 'product_id']);
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('birthdate')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender', length: 1)->nullable();
            $table->string('username');
            $table->binary('password', length: 64);
            $table->tinyInteger('status');
            $table->timestamp('created_on')->nullable();
            $table->unsignedBigInteger('position_id');
 
            $table->foreign('position_id')->references('id')->on('position');
        });
        
        Schema::create('log_activity', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('page');
            $table->timestamp('created_on')->nullable();
            $table->unsignedBigInteger('admin_id');
 
            $table->foreign('admin_id')->references('id')->on('admin');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activity');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('cart_item');
        Schema::dropIfExists('order_item');
        Schema::dropIfExists('order');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('position');
        Schema::dropIfExists('product_attribute');
        Schema::dropIfExists('category_attribute');
        Schema::dropIfExists('product');
    }
};
