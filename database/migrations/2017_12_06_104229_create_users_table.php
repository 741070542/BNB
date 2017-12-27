<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->increments('id');
            $table->string('key',128)->comment('用户唯一标识');
            $table->string('name',255)->nullable()->comment('酒店名称');
            $table->string('phone',20)->comment('电话');
            $table->string('password',64)->comment('密码');
            $table->string('img',1000)->nullable()->comment('头像');
            $table->integer('province_id')->comment('省id');
            $table->integer('city_id')->comment('市id');
            $table->integer('county_id')->comment('区县id');
            $table->string('address',1000)->nullable()->comment('详细地址');
            $table->string('contact_phone',20)->nullable()->comment('联系电话');
            $table->decimal('income',10,2)->default(0)->nullable()->comment('总收入');
            $table->decimal('spending',10,2)->default(0)->nullable()->comment('总支出');
            $table->string('addtime',24)->nullable()->comment('创建时间');
//            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
