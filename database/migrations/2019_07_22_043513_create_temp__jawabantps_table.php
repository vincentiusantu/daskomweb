<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempJawabantpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp__jawabantps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('praktikan_id');
            $table->unsignedBigInteger('soal_id');
            $table->unsignedBigInteger('modul_id');
            $table->text('jawaban');
            $table->timestamps();
            
            $table->foreign('praktikan_id')
                ->references('id')
                ->on('praktikans')
                ->onDelete('cascade');
        
            $table->foreign('modul_id')
                ->references('id')
                ->on('moduls')
                ->onDelete('cascade');
            
            $table->foreign('soal_id')
                ->references('id')
                ->on('soal__tps')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp__jawabantps');
    }
}
