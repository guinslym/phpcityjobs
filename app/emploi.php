<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    //
    protected $table = 'emplois';

    public function description()
	    {
	        return $this->hasOne('App\Description');
	    }
}
