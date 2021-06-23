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
            $table->string('books_ISBN13',20)->comment('ISBN13碼編號(index)')->unique();
            $table->string('books_category',20)->comment('書本分類')->index();
            $table->string('books_author',20)->comment('書本作者')->index();
            $table->string('books_publisher',20)->comment('書本出版社')->index();
            $table->string('books_name',50)->comment('書本名稱');
            $table->string('books_sub_title')->comment('書本副標')->nullable();
            $table->text('books_desc')->comment('書本簡介')->nullable();
            $table->text('books_pic')->comment('書本縮圖路徑')->nullable();
            $table->text('books_ver')->comment('書籍出版版本號')->nullable();
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
