<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //操作表
    public $table = 'links';
    public $primaryKey = 'id';
    protected $fillable = ['name','url','img','created_at','updated_at'];
}
