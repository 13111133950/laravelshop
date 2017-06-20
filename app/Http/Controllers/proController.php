<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cate;
use App\Pro;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Album;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class proController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro=Pro::paginate(5);
        return view("admin.listPro",[
            'pro'=>$pro
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Cate::all();
        return view("admin.addPro",[
            'cate'=>$cate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album=new Album();  
        $file=$request->file('source');   
        $arr=$request->all();
        $pro=Pro::create($arr);
        if($pro&&$file->isValid()){
            $filename=date('Y-m-d-H-i-s').'-'.$file->getClientOriginalName();//getClient 中有原文件名，扩展名
            Storage::disk('public')->put($filename,$file->getRealPath()); 
            $pid=$pro->id;
            $album->albumPath=$filename;
            $album->pid=$pid;
            $album->save();
            return redirect('admin/pro')->with('success','添加成功');
        }else {
            return redirect()->back()->with('error','图片上传失败');;
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        echo "show";
    }
    public function showplus(Request $request)
    {
        $order=$request->input('order');
        $key=$request->input('key');
        if($order){
            session()->put('order',$order);
        }
        if($key){
            session()->put('key',$key);
        }
        $order=Session::get('order');
        $key=Session::get('key');
        if($order&&$key){
            $pro=Pro::where('isShow', 1)->where('pName','like','%'.$key.'%')->orderby('iPrice',$order)->paginate(5);
        }elseif ($order){
            $pro=Pro::where('isShow', 1)->orderby('iPrice',$order)->paginate(5);
        }else{
            $pro=Pro::where('isShow', 1)->where('pName','like','%'.$key.'%')->paginate(5);
        }
        
        return view("admin.listPro",[
            'pro'=>$pro,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cate=Cate::all();
         $pro=Pro::find($id);
        return view("admin.editPro",[
            'cate'=>$cate,
            'pro'=>$pro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pro=Pro::find($id);
        $arr=$request->all();
        if($pro->update($arr)){
            return redirect('admin/pro')->with('success','修改成功');
        }else {
            return redirect()->back()->with('error','修改失败');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=Pro::find($id);
        $album=Album::where('pid',$id);
        if($pro->delete()&&$album->delete()){
            $data=[
                'status'=>1,
                'msg'=>'删除成功',
            ];
        }else {
           $data=[
                'status'=>0,
                'msg'=>'删除失败',
            ];
        }
        return $data;
    }
}
