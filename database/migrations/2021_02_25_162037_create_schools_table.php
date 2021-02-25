<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->char('name', 30)->unique()->comment('学校名称');
            $table->char('domain', 50)->unique()->comment('域名');
            $table->json('config')->comment('学校配置');
            // $table->foreignId('module_id')->nullable()->constrained()->onDelete("SET NULL")->comment('默认模块');
            // $table->foreignId('template_id')->nullable()->constrained()->onDelete("SET NULL")->comment('默认模板');
            $table->foreignId('user_id')->constrained()->onDelete("cascade")->comment('超管');
            $table->string('description', 100)->nullable()->comment('学校描述');
            $table->string('logo')->nullable()->comment('LOGO');
            $table->string('icp', 100)->nullable()->comment('ICP');
            $table->string('tel', 30)->nullable()->comment('对公电话');
            $table->string('email')->nullable()->comment('对公邮箱');
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
        Schema::dropIfExists('schools');
    }
}
