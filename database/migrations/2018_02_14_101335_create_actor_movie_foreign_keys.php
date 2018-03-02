<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorMovieForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor_movie', function($table) {
            $table->foreign('actor_id')
            ->references('id')
            ->on('actors');
            $table->foreign('movie_id')
            ->references('id')
            ->on('movies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor_movie', function($table) {
            $table->dropForeign(['movie_id']);
            $table->dropForeign(['actor']);
        });
    }
}
