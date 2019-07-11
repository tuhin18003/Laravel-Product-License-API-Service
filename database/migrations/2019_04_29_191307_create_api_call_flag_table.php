<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiCallFlagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( ! Schema::hasTable('api_call_flag') ){
            Schema::create('api_call_flag', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('api_call_history_id');
                $table->bigInteger('user_id');
                $table->bigInteger('website_id');
                $table->bigInteger('api_key_id');
                $table->string('coin_trxid');
                $table->decimal('total_coin', 16,8);
                $table->decimal('total_coin_price', 10,2 );
                $table->timestamps();
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
        Schema::dropIfExists('api_call_flag');
    }
}
