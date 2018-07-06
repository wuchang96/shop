<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goods';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['c_id','gname','descr','price','status','stock','color'];

    public function gs()
    {
        return $this->hasMany('App\Models\Admin\Goodspic','gid');
    }
}
