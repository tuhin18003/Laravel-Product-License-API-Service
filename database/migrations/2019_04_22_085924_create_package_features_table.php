<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasTable('package_features')){
            Schema::create('package_features', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('package_id');
                $table->foreign('package_id')->references('id')->on('upgrade_packages');
                $table->string('feature_name', 50);
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
        Schema::dropIfExists('package_features');
    }
}
