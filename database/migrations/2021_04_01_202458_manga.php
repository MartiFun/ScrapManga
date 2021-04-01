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
      Schema::create('mangas', function (Blueprint $table) {
          $table->id();
          $table->text('nom')->unique();
          $table->text('desc');
          $table->text('img');
          $table->text('auteur');
          $table->text('categorie');
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
