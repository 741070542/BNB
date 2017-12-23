<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->integer('type_id')->comment('房间类型id');
            $table->integer('user_id')->comment('用户id');
            $table->string('num',20)->nullable()->comment('房间号');
            $table->string('name',255)->nullable()->comment('房间名称');
            $table->string('address',2000)->nullable()->comment('房间详细地址');
            $table->tinyInteger('status')->default(1)->comment('1正常，2删除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
