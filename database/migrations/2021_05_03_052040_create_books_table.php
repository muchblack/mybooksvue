<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('books_ISBN',20)->comment('ISBN編號(index)')->unique();
            $table->string('books_category',50)->comment('書本分類')->index();
            $table->string('books_author',50)->comment('書本作者')->index();
            $table->string('books_publisher',50)->comment('書本出版社')->index();
            $table->text('books_name')->comment('書本名稱');
            $table->text('books_ori_name')->comment('原文書名')->nullable();
            $table->timestamp('books_var_date')->comment('書籍出版日')->nullable();
            $table->string('is_adult',1)->comment('是否為成人書籍')->default('N');
            $table->string('is_set',1)->comment('是否為套裝書')->default('N');
            $table->integer('set_no')->comment('集數')->default(1);
            $table->string('created_id',20)->comment('建立者');
            $table->string('updated_id',20)->comment('更新者');
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
        Schema::dropIfExists('books');
    }
}
