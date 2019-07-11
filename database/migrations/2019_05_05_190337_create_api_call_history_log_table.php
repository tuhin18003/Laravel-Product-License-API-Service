<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiCallHistoryLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('api_call_history_log') ){
            Schema::create('api_call_history_log', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('api_call_history_id');
                $table->foreign('api_call_history_id')->references('id')->on('api_call_history');
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
        Schema::dropIfExists('api_call_history_log');
    }
}
