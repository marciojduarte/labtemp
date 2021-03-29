<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $fillable = ['name','amout','available'];

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

    public function scopeexamesdoMes()
    {
        return  DB::table('exames')
        ->join('agenda_exame','agenda_exame.exame_id', '=','exames.id')
        ->join('agendas','agenda_exame.agenda_id','=','agendas.id')
        ->where('agendas.convenio_id',$this->id)
        ->join('calendarios','agendas.calendario_id','=','calendarios.id')
        ->whereMonth('calendarios.data',Carbon::now())
        ->select('exames.*')
        ->get();
    }
    public function scopeporcentagemdoMes()
    {
        $porcentagem = $this->examesdoMes()->sum('price')*100 / ($this->amout/10);
        return $porcentagem;
    }



}
