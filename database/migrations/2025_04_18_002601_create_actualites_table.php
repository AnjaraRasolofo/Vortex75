<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('contenu');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('date_publication')->nullable();
            $table->enum('status', ['brouillon', 'publie'])->default('brouillon');
            $table->foreign('categorie_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
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
        Schema::dropIfExists('actualites');
    }
}
