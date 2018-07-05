<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('images'); // hình ảnh
            $table->string('promo'); // khuyến mãi
            $table->string('packet');//phụ kiện gồm có
            $table->float('price');  // giá
            $table->integer('status');

            //Khai báo khóa ngoại
            $table->integer('category_id')->unsigned()->index();
            //Mối liên hệ khóa
            $table->foreign('category_id')
                  ->references('id')
                  ->on('category')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');    


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
        Schema::dropIfExists('product');
    }
}
