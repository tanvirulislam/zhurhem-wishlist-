<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->string('category_slug');
            $table->string('subcategory_slug');
            $table->string('product_slug');
            $table->string('price');
            $table->string('desc');
            $table->string('cloth_name');
            $table->string('size');
            $table->string('detail_and_care');
            $table->string('size_and_fit');
            $table->string('feature');
            $table->string('status');
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
}
