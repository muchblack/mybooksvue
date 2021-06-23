<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_category', function (Blueprint $table) {
            $table->id();
            $table->string('book_category_id',20)->comment('分類編號')->unique();
            $table->string('book_category_name',20)->comment('書本分類名稱');
            $table->string('book_category_parent_id',20)->comment('書本上層分類');
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
        Schema::dropIfExists('books_category');
    }
}
