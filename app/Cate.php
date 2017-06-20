<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    public $timestamps = false;
    protected $fillable = [
        'cName', 
    ];
    
    //自定义 添加where限制函数
    /* public function scopeLimit($arr){
        $arr->where('id','<','10');
    } */
    
}
