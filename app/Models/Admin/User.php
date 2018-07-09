<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['uname','password','email','tel','header','auth','age','sex','nickname','register_at'];
}
