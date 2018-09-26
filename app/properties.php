<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    protected $table = 'properties';
    protected $primaryKey = "__pk";

    public function location(){
    	return $this->belongsTo('App\locations', '_fk_location');
    }

    public function bookings(){
    	return $this->hasMany('App\bookings', '_fk_property');
    }
}
