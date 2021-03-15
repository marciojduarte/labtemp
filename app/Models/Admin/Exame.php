<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $fillable = ['name','codSus','price'];

    public function agendas()
    {
        return $this->belongsToMany('App\Models\Admin\Agenda');
    }

    public function agendamentos()
    {
        return $this->hasMany('App\Models\Admin\AgendaExame');
    }

}
