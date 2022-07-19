<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->longText('product_description');
            $table->string('product_summary');
            $table->string('product_photo')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_sub_category')->nullable();
            $table->string('product_brand')->nullable();
            $table->double('product_quantity');
            $table->double('product_price');
            $table->double('product_weight');
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
