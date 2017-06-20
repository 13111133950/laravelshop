<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    protected $table = 'pro';
    public $timestamps = false;
    protected $fillable = [
        'pName','pSn','pNum','mPrice','iPrice','pDesc' ,'cId'
    ];
    public function getCateById($id)
    {
        $cate=Cate::find($id);
        return $cate->cName;
    }
    public function getImgById($id)
    {
        $img=Album::where('pid',$id)->first();
        return $img;
    }
}
