<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function dni()
    {
        return $this->belongsTo('App\Dni');
    }
}
