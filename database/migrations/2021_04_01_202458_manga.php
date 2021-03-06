<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints();
      Schema::create('mangas', function (Blueprint $table) {
          $table->id();
          $table->text('nom');
          $table->text('img');
          $table->text('rank');
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
      Schema::dropIfExists('mangas');
    }
}
