<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('country')->nullable(); //FIXME, Needs to be a relationship
            $table->string('town')->nullable(); //FIXME, Needs to be a relationship
            $table->string('state_province')->nullable(); //FIXME, Needs to be a relationship
            $table->string('main_currency')->nullable(); //FIXME?, Needs to be a relationship?
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->longText('note')->nullable();
            $table->string('manager')->nullable();
            $table->string('capital')->nullable();
            $table->string('legal_form')->nullable(); //FIXME, Needs to be a relationship
            $table->string('profid1')->nullable();
            $table->string('profid2')->nullable();
            $table->string('profid3')->nullable();
            $table->string('profid4')->nullable();
            $table->string('vat')->nullable();
            $table->longText('object')->nullable();
            $table->string('fiscalmonthstart')->nullable();
            $table->boolean('vat_in_use')->nullable(); // name="optiontva" id="use_vat"/id="no_vat"
            $table->string('localtax1_in_use')->nullable(); //RE name="optionlocaltax1" id="use_lt1"/id="no_lt1"
            $table->string('localtax2_in_use')->nullable(); //IRPF name="optionlocaltax2" id="use_lt2"/id="no_lt2"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
