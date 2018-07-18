<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Lunbo extends Model
{
    public $table = 'lunbo';
    public $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = ['pic','url'];

}
