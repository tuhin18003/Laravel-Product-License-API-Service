<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiExpireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('api_expire') ){
            Schema::create('api_expire', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->integer('api_access_limit')->default(2)->nullable();
                $table->integer('website_access_limit')->nullable();
                $table->integer('package_id')->nullable();
                $table->string('order_number', 20)->nullable();
                $table->timestamp('expire_date')->nullable();
                $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('api_expire');
    }
}

