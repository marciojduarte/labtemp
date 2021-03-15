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
            $table->unsignedBigInteger('agenda_id');
            $table->unsignedBigInteger('exame_id');
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
            $table->foreign('exame_id')->references('id')->on('exames');
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
