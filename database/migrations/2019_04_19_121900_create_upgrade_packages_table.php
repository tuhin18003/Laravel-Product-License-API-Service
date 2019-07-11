<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpgradePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('upgrade_packages')){
            Schema::create('upgrade_packages', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string( 'name', 512);
                $table->bigInteger( 'user_id' );
                $table->decimal( 'price', 5,2);
                $table->integer( 'validity'); // 1 / 2 / 3
                $table->integer( 'validity_type'); // 1 = month, 2 = year, 3 = days
                $table->integer( 'access_website');
                $table->integer( 'access_limit');
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
        Schema::dropIfExists('upgrade_packages');
    }
}
