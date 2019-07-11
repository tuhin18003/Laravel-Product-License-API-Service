<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiCallHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( ! Schema::hasTable('api_call_history') ){
            Schema::create('api_call_history', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->bigInteger('website_id');
                $table->foreign('website_id')->references('id')->on('integrated_websites');
                $table->bigInteger('api_key_id');
                $table->foreign('api_key_id')->references('id')->on('apis');
                $table->string('coin_web_id', 28);
                $table->string('coin_trxid');
                $table->decimal('total_coin', 16,8);
                $table->decimal('total_coin_price', 10,2 );
                $table->char('status', 1);
                $table->timestamps();
            });
        }
    }

//    ALTER TABLE api_call_history ADD COLUMN coin_name varchar(28) AFTER api_key_id
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_call_history');
    }
}
