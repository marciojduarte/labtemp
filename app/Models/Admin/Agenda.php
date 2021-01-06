<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['paciente_id','solicitante_id','convenio_id','user_id','calendario_id'];

    /**Relacionamentos */
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
     public function calendario()
    {
        return $this->belongsTo('App\Models\Admin\Calendario');
    }

    public function exames()
    {
        return $this->belongsToMany('App\Models\Admin\Exame');
    }

}
