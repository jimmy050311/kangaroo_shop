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
        Schema::create('verify_features', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('項目名稱');
            $table->integer('parent')->comment('父功能id');
            $table->string('url')->comment('路徑');
            $table->string('icon')->comment('圖樣');
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
        Schema::dropIfExists('verify_features');
    }
};
