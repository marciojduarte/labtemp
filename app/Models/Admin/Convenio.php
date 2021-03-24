<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $fillable = ['name','amout'];

    public function pacientes()
    {
        return $this->hasMany('App\Models\Admin\Paciente');
    }

    public function agendas()
    {
        return $this->hasMany('App\Models\Admin\Agenda');
    }

    public function calendarios()
    {
        return $this->hasMany('App\Models\Admin\Calendario');
    }

    public function gastoMensal()
    {
        $calendarios =  $this->calendarios()->whereMonth('data', Carbon::now());
        return DB::table('exames')
                            ->join('agenda_exame','agenda_exame.exame_id', '=','exames.id')
                            ->join('agendas','agenda_exame.agenda_id','=','agendas.id')
                            ->whereIn('agendas.calendario_id',[$calendarios])
                            ->select('exames.*')
                            ->get();
    }

    public function scopeexamesdoConvenio()
    {
        $mes =  Calendario::whereMonth('data', Carbon::now())->get();
        return DB::table('exames')
        ->join('agenda_exame','agenda_exame.exame_id', '=','exames.id')
        ->join('agendas','agenda_exame.agenda_id','=','agendas.id')
        ->join('calendarios','agendas.calendario_id','=','calendarios.id')
        ->where('agendas.convenio_id',$this->id)
        //->whereIn('calendarios.data',$mes)
         ->where(function($query)use ($mes){
             if ($mes!=[])
             $query->whereIn('calendarios.id',$mes);
         })
        ->select('exames.*')
        ->get();
    }
}
