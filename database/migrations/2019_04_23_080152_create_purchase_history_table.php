<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('purchase_history')){
            Schema::create('purchase_history', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->bigInteger( 'order_id' );
                $table->foreign('order_id')->references('order_id')->on('orders');
                $table->string('package_name', 512);
                $table->text('package_features');
                $table->integer('website_access_limit');
                $table->integer('api_access_limit');
                $table->decimal('price', 5,2);
                $table->string('payment_type');
                $table->string('order_number', 20)->nullable();
                $table->dateTime('purchase_on');
                $table->dateTime('expire_on');
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
        Schema::dropIfExists('purchase_history');
    }
}
