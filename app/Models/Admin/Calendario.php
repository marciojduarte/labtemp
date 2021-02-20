<?php

namespace App\Models\Admin;
use App\Models\Admin\Agenda;


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

}
