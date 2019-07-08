<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->boolean('for_sale');
            $table->integer('product_type')->nullable(); // Relation?
            $table->integer('product_category')->nullable(); // Relation?
            $table->float('price', 10, 2)->nullable();
            $table->boolean('active');
            $table->string('ean13')->nullable();
            $table->string('internal_reference')->nullable();
            $table->float('cost_price', 10, 2)->nullable();
            $table->integer('qty_on_hand')->nullable();
            $table->integer('qty_incommig')->nullable();
            $table->integer('qty_forecasted')->nullable();
            $table->integer('product_status')->nullable(); // Relation?
            $table->float('weight_volume', 10, 3)->nullable();
            $table->float('weight_gross_weight', 10, 2)->nullable();
            $table->float('weight_net_weight', 10, 2)->nullable();
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