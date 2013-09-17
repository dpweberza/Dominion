<?php

use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('modules', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('controller');
            $table->integer('status_id');
            $table->integer('module_group_id')->unsigned();
            $table->foreign('module_group_id')->references('id')->on('module_groups');
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
        \Schema::drop('modules');
    }

}