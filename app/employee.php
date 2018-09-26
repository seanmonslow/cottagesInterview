<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = "__pk";

    public function department(){
    	return $this->belongsTo('App\department', '_fk_department');
    }
}