<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = "__pk";
    
    public function location(){
    	return $this->belongsTo('App\properties', '_fk_property');
    }
}
