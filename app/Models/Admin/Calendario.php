<?php

namespace App\Models\Admin;
use App\Models\Admin\Agenda;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $fillable = ['data','convenio_id','atendimento', 'limite'];

    public function convenio()
    {
        return $this->belongsTo('App\Models\Admin\convenio');
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function scopeexamesdoDia()
    {
        return DB::table('exames')
        ->join('agenda_exame','agenda_exame.exame_id', '=','exames.id')
        ->join('agendas','agenda_exame.agenda_id','=','agendas.id')
        ->where('agendas.calendario_id',$this->id)
        ->select('exames.*')
        ->get();

    }
    public function scopeexamesdoMes()
    {
        return DB::table('exames')
        ->join('agenda_exame','agenda_exame.exame_id', '=','exames.id')
        ->join('agendas','agenda_exame.agenda_id','=','agendas.id')
        ->where('agendas.calendario_id',$this->id)
        ->select('exames.*')
        ->get();

    }
}
