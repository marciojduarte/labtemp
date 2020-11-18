<?php

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $fillable = ['data','convenio_id'];

    public function convenio()
    {
        return $this->belongsTo('App\Models\Admin\convenio');
    }
    public function agendas()
    {
        return $this->hasmMany('App\Models\Admin\Agenda');
    }

}
