<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class lunbo extends Model
{
    public $table = 'lunbo';
    public $primaryKey = 'id';
    protected $fillable = ['pic','url'];

}
