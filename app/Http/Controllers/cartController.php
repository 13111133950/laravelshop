<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pro;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("shop.cart");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "creat";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return "store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }
    
    public function addcart(Request $request)
    {
        $id=$request->input('id');
        $num=$request->input('num');
        $pro=Pro::find($id);
        $pro['num']=$num;
        $pro['price']=$num*$pro['iPrice'];
        if(session()->has('cart')){
             $arr=session()->get('cart');
             $arr[] = $pro;
             session(['cart'=>$arr]);
             $mes="成功添加了".$num."件". $pro['pName']." 进购物车！"; 
        }
        else
        {
            $arr[]=$pro;
            session(['cart'=>$arr]);
            $mes="成功添加了".$num."件". $pro->pName." 进购物车！"; 
           
        }
        return redirect()->back()->with('success',$mes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit";
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
        return "up";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "des";
    }
}
