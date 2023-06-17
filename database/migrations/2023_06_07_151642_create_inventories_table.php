<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->comment('商品id');
            $table->integer('admin_id')->comment('管理員id');
            $table->string('number')->comment('單號');
            $table->integer('type')->comment('1=>進貨 2=> 退貨 3=>庫存異動(入倉) 4=>庫存異動(出倉) 5=>購買');
            $table->integer('before_quantity')->comment('異動前數量');
            $table->integer('quantity')->comment('異動數量');
            $table->integer('after_quantity')->comment('異動後數量');
            $table->string('remark')->comment('備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
