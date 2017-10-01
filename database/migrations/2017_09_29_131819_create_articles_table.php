<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->string('title');
            $table->text('body');
            $table->integer('create_time')->unsigned();
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('articles')->insert([
            'title' => 'Первая запись',
            'img' => 'https://i.mycdn.me/image?id=838978449982&t=36&plc=WEB&tkn=*Yp8YtD6tsbtQtt37lG3PT7VH9_0',
            'body' => 'Всем привет, первая запись блога',
            'create_time' => time(),
            'slug' => 'pervaya-zapis'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
