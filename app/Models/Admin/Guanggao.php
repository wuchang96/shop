<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Guanggao extends Model
{
    public $table = 'advresing';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];

    
  	public function gc()
    {
        return $this->hasOne('App\Models\Admin\Gcate','id','cid');
    }  
}
 