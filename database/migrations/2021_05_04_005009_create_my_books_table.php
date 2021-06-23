<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_books', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->comment('使用者ID')->index();
            $table->integer('book_id')->comment('書本ID')->index();
            $table->string('book_at',30)->comment('書本所在地')->nullable();
            $table->text('book_note')->comment('書本備註')->nullable();
            $table->string('book_buyat',50)->comment('書本購入地點')->nullable();
            $table->string('book_price',50)->comment('書本購入價格')->nullable();
            $table->dateTime('book_buy_time')->comment('書本購入時間')->nullable();
            $table->text('book_personal_comment')->comment('書本個人評語')->nullable();
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
        Schema::dropIfExists('my_books');
    }
}
