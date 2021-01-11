<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgendaExameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_exame', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exame_id');
            $table->unsignedBigInteger('agenda_id');
            $table->foreign('exame_id')->references('id')->on('exames');
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
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
        //
    }
}
