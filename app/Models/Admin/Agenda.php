<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['paciente_id','solicitante_id','convenio_id','user_id','calendario_id'];

    public function calendario()
    {
        return $this->belongsTo('App\Models\Admin\Calendario');
    }

    public function exames()
    {
        return $this->belongsToMany('App\Models\Admin\Exame', 'agenda_exame', 'agenda_id');
    }

    public function paciente()
     {
         return $this->belongsTo('App\Models\Admin\Paciente');
     }

    public function solicitante()
     {
         return $this->belongsTo('App\Models\Admin\Solicitante');
     }

     public function convenio()
    {
        return $this->belongsTo('App\Models\Admin\Convenio');
    }

    public function examesDaAgenda()
    {
        $exames = Exame::whereIn('exames.id', function ($query){
            $query->select('agenda_exame.exame_id');
            $query->from('agenda_exame');
            $query->whereRaw("agenda_exame.agenda_id = {$this->id}");

        })->get();
        return $exames;

    }

    public function examesCalendario()
    {
        $exames = DB::table('exames')
                    ->select('calendarios.data','convenios.name', DB::raw ('sum(exames.price) as Total'))
                    ->join('agenda_exame', 'agenda_exame.exame_id','=','exames.id')
                    ->join('agendas','agendas.id','=','agenda_exame.agenda_id')
                    ->join('calendarios','calendarios.id','=', 'agendas.calendario_id')
                    ->join('convenios','convenios.id','=','calendarios.convenio_id')
                    ->groupBy('calendarios.data', 'convenios.name')

                    ->get();
        dd($exames);
    }


   public function examesDisponiveis()
    {
        $exames = Exame::whereNotIn('exames.id', function($query) {
            $query->select('agenda_exame.exame_id');
            $query->from('agenda_exame');
            $query->whereRaw("agenda_exame.agenda_id={$this->id}");
        })->get();

        return $exames;
    }
}
