<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('orders') ) {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('order_id', 28);
                $table->bigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->bigInteger('package_id');
                $table->foreign('package_id')->references('id')->on('upgrade_packages');
                $table->decimal('price', 5,2);
                $table->char('status', 1)->default(1); // 1 = unconfirmed 2 = confirmed
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
        Schema::dropIfExists('orders');
    }
}
