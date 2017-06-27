<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cate;
use Illuminate\Support\Facades\Session;
use App\Pro;
class userController extends Controller{
    public function reg(Request $request){
        $user=new User();
      if ($request->isMethod('POST')) {
      $validate=\Validator::make($request->all() ,[
                'username'=>'required|min:2|max:10',
                'password'=>'required|min:6|max:14|alpha_num|confirmed',
                'tel'=>'required',
                'email'=>'required|email'
            
            ],[
                'required'=>':attribute 必须填写',
                'min'=>':attribute太短',
                'max'=>':attribute太长',
                'confirmed'=>'两次输入的密码不一样',
                'email'=>'电子邮箱格式不正确',
                
            
            
            ],[
                'username'=>'用户名',
                'password'=>'密码',
                'tel'=>'联系电话',
                'email'=>'电子邮箱'
            ]);
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withInput();//将 $request信息放入input中
            }
            $arr=$request->all();
            if(User::create($arr)){
                return redirect('log')->with('success','注册成功');
            }else {
                return redirect()->back()->with('error','注册失败');;
            } 
      }
        return view('shop.reg',[
            'user'=>$user
        ]);
    }
    public function log(Request $request){
        if ($request->isMethod('POST')) {
            $arr=$request->all();
            $user=User::where( ['username'=>$arr['username'],'password'=>$arr['password']])->get();
            if($user->first()){
                 session(['user'=>$arr['username']]);
                 if(session('url')){
                     $url=session('url');
                     return redirect($url);
                 }else{
                     return redirect('index');
                 } 
            }else{
                return redirect()->back()->withErrors('用户名密码错误');
            } 
             
        }
        return view('shop.log');
    }
    public function index(){
        $cate=Cate::all();
        return view('shop.index',[
            'cate'=>$cate
        ]);
    }
    public function quit(Request $request){
        //session(['user'=>null,'cart'=>null,'url'=>null]);
        $request->session()->flush();
        return redirect()->back();
    }
    public function shop(Request $request){
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
            $pros=Pro::where('isShow', 1)->where('pName','like','%'.$key.'%')->orderby('iPrice',$order)->get();
        }elseif ($order){
            $pros=Pro::where('isShow', 1)->orderby('iPrice',$order)->get();
        }else{
            $pros=Pro::where('isShow', 1)->where('pName','like','%'.$key.'%')->get();
        }
        return view('shop.shop',[
            'pros'=>$pros
        ]);
    }
    
    public function detail(Request $request){
        $id=$request->input('id');
        $pro=Pro::find($id);
        return view('shop.detail',[
            'pro'=>$pro
        ]);
    }
    public function test(){
        return view('common.bsframe');
    }
}