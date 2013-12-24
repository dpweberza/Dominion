<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelectGroupsTable extends Migration {

    public function up() {
        Schema::create('select_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
        });
    }

    public function down() {
        Schema::drop('select_groups');
    }

}
