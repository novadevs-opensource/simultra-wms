<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('product')->nullable(); // Relation
            $table->float('qty',10,3)->nullable();
            $table->string('description')->nullable();
            $table->string('source')->nullable();
            $table->integer('source_location')->nullable(); // Relation
            $table->integer('destination_location')->nullable(); // Relation
            $table->integer('picking_type')->nullable(); // Relation ?
            $table->integer('priority')->nullable(); // Relation ?
            $table->date('expected_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_moves');
    }
}