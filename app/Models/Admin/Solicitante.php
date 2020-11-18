<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $fillable = ['name','conselho'];

    public function pacientes()
    {
        return $this->hasMany('App\Paciente');
    }
}
