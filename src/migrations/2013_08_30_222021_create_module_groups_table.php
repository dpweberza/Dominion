<?php

use Illuminate\Database\Migrations\Migration;

class CreateModuleGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('module_groups', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('icon_class');
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
        \Schema::drop('module_groups');
    }

}