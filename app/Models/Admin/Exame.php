<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $fillable = ['name','codSus','price'];

    public function pacientes()
    {
        return $this->belongsToMany('App\Models\Admin\Paciente');
    }

    public function agendas()
    {
        return $this->belongsToMany('App\Models\Admin\AgendaExame');
    }
}
