<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_name',20)->comment('使用者名稱');
            $table->string('member_pwd',100)->comment('使用者密碼');
            $table->string('member_rule',100)->comment('使用者權限')->nullable();
            $table->string('member_email',100)->comment('使用者email')->index();
            $table->string('is_verify',1)->comment('使用者信箱是否驗證')->default(0);
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
        Schema::dropIfExists('members');
    }
}
