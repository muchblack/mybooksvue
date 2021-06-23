<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksPublishers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_publishers', function (Blueprint $table) {
            $table->id();
            $table->string('publisher_name',50)->comment('出版社名稱');
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
        Schema::dropIfExists('books_publishers');
    }
}
