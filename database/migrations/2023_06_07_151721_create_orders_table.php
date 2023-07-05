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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->comment('訂單編號');
            $table->integer('user_id')->comment('會員');
            $table->decimal('price', 9, 2)->comment('小計');
            $table->decimal('discount', 9, 2)->comment('折扣');
            $table->decimal('ship', 9, 2)->comment('運費');
            $table->decimal('total_price', 9, 2)->comment('總金額');
            $table->decimal('total_amount', 9, 2)->comment('總數量');
            $table->integer('status')->comment('狀態 0=>未付款, 1=>已付款, 2=>已退款');
            $table->integer('ship_status')->comment('貨運狀態 0=>未出貨, 1=>已出貨, 2=>已退貨');
            $table->string('country')->comment('國家');
            $table->string('zipcode')->comment('郵遞區號');
            $table->string('county')->comment('縣市');
            $table->string('district')->comment('鄉鎮市區');
            $table->string('address')->comment('地址');
            $table->string('remark')->comment('備註');
            $table->dateTime('paid_at')->nullable()->comment('付款時間');
            $table->dateTime('refund_at')->nullable()->comment('退款時間');
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
        Schema::dropIfExists('orders');
    }
};
