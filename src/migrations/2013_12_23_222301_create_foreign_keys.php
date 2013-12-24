<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

    public function up() {
        Schema::table('select_options', function(Blueprint $table) {
            $table->foreign('select_group_id')->references('id')->on('select_groups')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    public function down() {
        Schema::table('select_options', function(Blueprint $table) {
            $table->dropForeign('select_options_select_group_id_foreign');
        });
    }

}
