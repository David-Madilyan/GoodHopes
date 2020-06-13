<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReservsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reservs', function(Blueprint $table){
        $table->integer('count_persons');
        $table->integer('type_room');
        $table->string('username', 150);
        $table->string('phone', 50);
        $table->uuid('uuid');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {  }
}
