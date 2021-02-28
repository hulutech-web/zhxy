<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable()->constrained()->onDelete("SET NULL")->comment('所在学校');
            $table->string('STUID')->nullable()->unique()->comment('学号');
            $table->string('className')->nullable()->unique()->comment('所在班级');
            $table->string('gradeName')->nullable()->unique()->comment('所在年级');
            $table->string('entranceId')->nullable()->unique()->comment('门禁卡号');
            $table->string('parent')->nullable()->default(null)->comment('学生父母');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->commment('对应用户');
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
        Schema::dropIfExists('students');
    }
}
