<?php

namespace App\Listeners;

use App\Events\PacienteAgendado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncrementsPacienteCalendario
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PacienteAgendado $agenda)
    {
        $calendario = $agenda->calendario();
        dd($calendario);
        $calendario->paciente++;

    }
}
