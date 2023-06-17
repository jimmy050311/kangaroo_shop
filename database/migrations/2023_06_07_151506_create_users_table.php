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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名稱');
            $table->integer('type')->comment('1=>自然人 2=>法人');
            $table->string('account')->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->string('email')->comment('信箱');
            $table->string('id_number')->nullable()->comment('身分證字號');
            $table->string('taxid')->nullable()->comment('統一編號');
            $table->string('phone')->comment('聯絡電話');
            $table->integer('status')->comment('狀態1 => 開通 2=> 停權');
            $table->integer('gender')->nullable()->comment('1=>男生 2=>女生');
            $table->dateTime('birth')->nullable()->comment('生日');
            $table->string('country')->comment('國家');
            $table->string('zipcode')->comment('郵遞區號');
            $table->string('county')->comment('縣市');
            $table->string('district')->comment('鄉鎮市區');
            $table->string('address')->comment('地址');
            $table->string('bank_user_name')->comment('帳戶人名稱');
            $table->string('bank_name')->comment('銀行名稱');
            $table->string('bank_code')->comment('銀行代碼');
            $table->string('branch_name')->comment('分行名稱');
            $table->string('branch_code')->comment('分行代碼');
            $table->string('bank_account')->comment('銀行帳號');
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
        Schema::dropIfExists('users');
    }
};
