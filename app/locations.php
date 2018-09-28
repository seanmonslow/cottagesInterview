<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $table = 'locations';
    protected $primaryKey = "__pk";

    public function properties(){
    	return $this->hasMany('App\properties', '_fk_location');
    }
}
