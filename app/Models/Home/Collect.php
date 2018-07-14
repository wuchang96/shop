<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'collect';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['u_id','g_id','name','pic','price','color'];
}
