<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'news';

    protected $primaryKey = 'id';

    public $timestamps = true;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [];

}
