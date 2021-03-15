<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AgendaExame extends Model
{
   protected $table = 'agenda_exame';
   protected $fillable = ['exame_id','agenda_id'];

   /**
     * The roles that belong to the AgendaExame
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function agenda()
    {
        return $this->belongsTo('App\Models\Admin\Agenda');
    }
    public function exame()
     {
         return $this->belongsTo('App\Models\Admin\Exame');
     }
}
