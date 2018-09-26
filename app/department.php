<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table = 'department';
    protected $primaryKey = "__pk";

    public function employees(){
    	return $this->hasMany('App\employee', '_fk_department');
    }
}
