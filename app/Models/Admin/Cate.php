<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'cate';

    protected $primaryKey = 'id';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['title','pid','path'];




   public static function getsubcate($pid)
    {

        $cate = Cate::where('pid',$pid)->get();
        
        $arr = [];

        foreach($cate as $k=>$v){

            if($v->pid==$pid){

                $v->sub=self::getsubcate($v->id);

                $arr[]=$v;
            }
        }  
        return $arr;
    }
}
