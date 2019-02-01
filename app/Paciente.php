<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    public function dni()
    {
        return $this->belongsTo('App\Dni');
    }
}
