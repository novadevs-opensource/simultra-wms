<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('partner')->nullable(); // Relation
            $table->integer('product')->nullable(); // Relation
            $table->float('qty',10,3)->nullable();

            $table->integer('destination_location'); // Relation
            // $table->foreign('destination_location')->references('id')->on('locations');

            $table->integer('source_location'); // Relation
            // $table->foreign('source_location')->references('id')->on('locations');

            $table->string('description')->nullable();
            $table->string('reference')->nullable();
            $table->boolean('availability')->nullable();
            $table->integer('status')->nullable();
            $table->string('source_document')->nullable();
            $table->date('scheduled_date')->nullable();
            $table->integer('priority')->nullable(); // Relation ?
            $table->boolean('status');

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