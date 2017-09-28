<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('img');
            $table->string('head');
            $table->text('body');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'title' => 'Михаил Старков',
            'img' => 'http://media.istockphoto.com/photos/green-check-mark-picture-id537315667?k=6&m=537315667&s=612x612&w=0&h=-tLNUTqEdqs-qJ4uGXbqSveDkKbXidORbXnZuD8o4tM=',
            'head' => 'Всем привет',
            'body' => 'Бла, бла',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
