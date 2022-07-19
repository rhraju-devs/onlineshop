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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->string('address');
            $table->text('vendor_description');
            $table->integer('zip');
            $table->string('fax');
            $table->string('products');
            $table->string('services');
            $table->string('license_num')->nullable;
            $table->text('information');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('vendors');
    }
};
