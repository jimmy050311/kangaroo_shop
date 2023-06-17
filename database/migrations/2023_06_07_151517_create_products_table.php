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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->string('image')->comment('圖片');
            $table->string('number')->comment('產品編號');
            $table->integer('category_id')->comment('類別');
            $table->double('rate')->comment('匯率(1澳幣換多少台幣)');
            $table->decimal('profit', 5, 4)->comment('毛利');
            $table->decimal('origin_price_aud', 9, 2)->comment('澳幣原始價格(成本價)');
            $table->decimal('real_price_aud', 9, 2)->comment('澳幣售價');
            $table->decimal('origin_price_twd', 9, 2)->comment('台幣原始價格(成本價)');
            $table->decimal('real_price_twd', 9, 2)->comment('台幣售價');
            $table->longText('spec')->comment('規格');
            $table->longText('description')->comment('簡述');
            $table->longText('introduction')->comment('商品介紹');
            $table->integer('amount')->comment('數量');
            $table->integer('status')->comment('狀態1 => 上架 2=> 下架');
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
        Schema::dropIfExists('products');
    }
};
