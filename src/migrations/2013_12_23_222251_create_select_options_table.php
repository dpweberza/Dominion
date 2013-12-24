<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelectOptionsTable extends Migration {

    public function up() {
        Schema::create('select_options', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('value', 255);
            $table->integer('select_group_id')->unsigned()->index();
        });
    }

    public function down() {
        Schema::drop('select_options');
    }

}
