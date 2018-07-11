<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Lunbo extends Model
{
    public $table = 'lunbo';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['pic_1','url_1','pic_2','url_2','pic_3','url_3','pic_4','url_4','pic_5','url_5','pic_6','url_6'];

}
