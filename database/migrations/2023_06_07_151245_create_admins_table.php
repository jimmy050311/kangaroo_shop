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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('管理員名稱');
            $table->string('account')->comment('管理員帳號');
            $table->string('password')->comment('管理員密碼');
            $table->string('phone')->comment('管理員手機');
            $table->string('email')->comment('管理員信箱');
            $table->integer('status')->comment('狀態1 => 開通 2=> 停權');
            $table->integer('verify_id')->comment('權限');
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
        Schema::dropIfExists('admins');
    }
};
