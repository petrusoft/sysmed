<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dni extends Model
{
    use SoftDeletes;

    protected $table = 'dni';
    protected $dates = ['deleted_at'];

}
