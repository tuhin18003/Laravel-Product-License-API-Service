<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('discount_offers') ){
            Schema::create('discount_offers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->integer('websites');
                $table->integer('validity_years');
                $table->integer('offer_amount');
                $table->dateTime( 'offer_started' );
                $table->dateTime( 'valid_til' );
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_offers');
    }
}
