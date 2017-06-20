<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\cateRequest;

class cateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate=Cate::paginate(5);
        return view('admin.listcate',[
            'cate'=>$cate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cateRequest $request)
    {
        $arr=$request->all();
        if(Cate::create($arr)){
            return redirect('admin/cate')->with('success','添加成功');
        }else {
            return redirect()->back()->with('error','添加失败');;
        } 

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate=Cate::find($id);
        return view('admin.editcate',[
            'cate'=>$cate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cateRequest $request, $id)
    {
        $cate=Cate::find($id);
        $arr=$request->all();
        if($cate->update($arr)){
            return redirect('admin/cate')->with('success','修改成功');
        }else {
            return redirect()->back()->with('error','修改失败');;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate=Cate::find($id);
        if($cate->delete()){
            return redirect('admin/cate')->with('success','删除成功');
        }else {
            return redirect()->back()->with('error','删除失败');
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
        $cate=Cate::find($id);
        if($cate->delete()){
            return redirect('admin/cate')->with('success','删除成功');
        }else {
            return redirect()->back()->with('error','删除失败');
        } 
        
        /* <form action="/task/{{ $task->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        
        <button>删除任务</button>
        </form> */
    }
}
