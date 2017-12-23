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
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->integer('type_id')->comment('房型id');
            $table->integer('house_id')->comment('房间id');
            $table->integer('user_id')->comment('用户id');
            $table->tinyInteger('status')->default(1)->comment('1预定，2屏蔽，3取消订单，4取消屏蔽');
            $table->integer('source_id')->comment('来源id');
            $table->decimal('revenue',10,2)->default(0)->nullable()->comment('收入');
            $table->string('name',255)->nullable()->comment('入住姓名');
            $table->string('phone',20)->nullable()->comment('入住电话');
            $table->string('wx',20)->nullable()->comment('微信号');
            $table->string('remark',1000)->nullable()->comment('备注');
            $table->integer('color_id')->comment('颜色id');
            $table->string('sta_time',24)->nullable()->comment('入住时间');
            $table->string('com_time',24)->nullable()->comment('结束时间');
        });
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
