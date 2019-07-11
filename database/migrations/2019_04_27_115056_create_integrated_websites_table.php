<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegratedWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('integrated_websites') ) {
            Schema::create('integrated_websites', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('website_url');
                $table->string('used_api_key', 100);
                $table->bigInteger('api_expire_id');
                $table->foreign('api_expire_id')->references('id')->on('api_expire');
                $table->char('status', 1);
                $table->softDeletes();
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
        Schema::dropIfExists('integrated_websites');
    }
}
