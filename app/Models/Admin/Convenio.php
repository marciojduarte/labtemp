<?php

namespace App\Models\Admin;

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
}
