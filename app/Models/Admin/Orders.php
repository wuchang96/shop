<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders';

    // protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['oid','name','u_id','addr','tel','cnt','sum','create_at','umsg','status'];


    public function odeta()
    {
        return $this->hasMany('App\Models\Admin\Odetails','oid','oid');
    }
}
