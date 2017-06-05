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

	public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("POSITION", "LIKE","%$keyword%");
            });
        }
        return $query;
    }
}
