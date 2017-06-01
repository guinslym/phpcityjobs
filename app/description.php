<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class description extends Model
{
    //
    protected $table = 'descriptions';

    public function emploi()
    {
        return $this->belongsTo('App\Emploi');
    }
}
