<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function($table) {
            $table->foreign('category_id')
            ->references('id')
            ->on('categories');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function($table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
