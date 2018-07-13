<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'cart';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['u_id','g_id','name','color','size','price','gimg','cnt'];
}
