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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->comment('訂單id');
            $table->integer('product_id')->comment('產品id');
            $table->string('name')->comment('產品名稱');
            $table->string('number')->comment('產品編號');
            $table->string('image')->comment('產品圖片');
            $table->decimal('origin_price_aud', 9, 2)->comment('產品原價(澳幣)');
            $table->decimal('real_price_aud', 9, 2)->comment('產品售價(澳幣)');
            $table->decimal('origin_price_twd', 9, 2)->comment('產品原價(台幣)');
            $table->decimal('real_price_twd', 9, 2)->comment('產品售價(台幣)');
            $table->integer('amount')->comment('數量');
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
        Schema::dropIfExists('order_details');
    }
};
