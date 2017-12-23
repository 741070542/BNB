<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->string('firstday',24)->nullable()->comment('月');
            $table->integer('thismonth_come')->default(0)->comment('本月入住');
            $table->integer('lastmonth_come')->default(0)->comment('上月入住');
            $table->decimal('thismonth_revenue',10,2)->default(0)->comment('本月收入');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
