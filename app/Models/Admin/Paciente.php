<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
protected $fillable = ['name','dataNascimento','sus'];

    public function solicitante()
    {
        return $this->belongsTo('App\Models\Admin\Solicitante');
    }

    public function convenio()
    {
        return $this->belongsTo('App\Models\Admin\Convenio');
    }

    public function exames()
    {
        return $this->belongsToMany('App\Models\Admin\Exame');
    }

    public function agendas()
    {
        return $this->hasMany('App\Models\Admin\Agenda');
    }

     /**
     * exame not linked with this paciente
     */
    // public function AgendaAvailable($filter = null)
    // {
    //     $Agenda = agenda::whereNotIn('agenda.id', function($query) {
    //         $query->select('exame_paciente.exame_id');
    //         $query->from('exame_paciente');
    //         $query->whereRaw("exame_paciente.paciente_id={$this->id}");
    //     })
    //     ->where(function ($queryFilter) use ($filter) {
    //         if ($filter)
    //             $queryFilter->where('exames.name', 'LIKE', "%{$filter}%");
    //     })
    //     ->get();

    //     return $exames;
    // }

    /**
     * exame not linked with this paciente
     */
    public function examesAvailable($filter = null)
    {
        $exames = exame::whereNotIn('exames.id', function($query) {
            $query->select('exame_paciente.exame_id');
            $query->from('exame_paciente');
            $query->whereRaw("exame_paciente.paciente_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('exames.name', 'LIKE', "%{$filter}%");
        })
        ->get();

        return $exames;
    }
}


