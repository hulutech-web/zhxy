<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable()->comment('昵称');
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique()->comment('手机号');
            $table->string('password')->comment('密码');
            $table->string('real_name', 20)->nullable()->comment('真实姓名');
            $table->string('avatar')->nullable()->comment('头像');
            $table->char('CID', 18)->nullable()->unique()->comment('身份证号');
            $table->string('attendance_num')->nullable()->comment('门禁卡号');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
}
