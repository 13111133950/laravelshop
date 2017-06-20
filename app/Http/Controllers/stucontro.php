<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
class stucontro extends Controller
{
    public function test1() {
        //DB FACADE
        /* $student=DB::select('select * from user');
        var_dump($student); */
        
        
         $student=DB::insert('insert into student(name,age) values(?,?)',['li',19]);
        var_dump($student); 
        
        /* $student=DB::update('update student set age=? where name=?',[20,'li']);
        var_dump($student); */
        
        /* $student=DB::delete('delete from student where name=?',['li']);
        var_dump($student); */
        
        //��ѯ������
         /* $bool=DB::table('student')->insert(
            ['name'=>'libai','age'=>18]
        );
        var_dump($bool);  */
        
        /* $bool=DB::table('student')
        ->where('id',1)
        ->update(
            ['name'=>'caocao','age'=>28]
        );
        var_dump($bool); */
        
        //get() ��ȡ�����������
        /* $stu=DB::table('student')->get();
        dd($stu); */
        
        //first����ȡ�������һ��
        
        //->whereRaw('id>? and age>?',[1,2])
        
        //pluck('name')��name�����ŵ�һ������
        
        //list('name')ͬ�ϣ�list('name'��'id') id��Ϊ����������±�
        
        //ָ�����ؼ�¼��
        /* echo '<pre>';
        $stu=DB::table('student')->chunk(2,function($aaa){
            var_dump($aaa);
        }); */
        
        
        //�ۺϺ���
        //count�������ؼ�¼��
        //max��''�����ز��������  min����
        //avg��''��ƽ��  sum��''����
        
    }
    //Eloquent orm
    function orm1() {
        //all()
        /* $student=student::all(); */
        //find('') ͨ���������� findOrFail('')
        //firstOrCreate()���������������
        dd($student);
    }
    public function request1(Request $request){
        //1.ȡֵ
        echo $request->input('name');
        //echo $request->input('sex','nan');
        //echo $request->all();
        
    }
    public function session1(Request $request){
        //$request->session()->put('key1','value1');
        //session()->put('key2','value2');
        Session::put('key3','value3'); //����use\ilu
        Session::flash('flashkey','flashkey');//�ݴ�����
    
    }
    public function session2(Request $request){
        echo $request->session()->get('flashkey');
    
    }
    
    public function response() {
        $date=[
            'name'=>'li',
            'age'=>18
            
        ];
        return response()->json($date);
        //�ض���
        return redirect('session2');
        //�ض�����ݴ�����
        return redirect('session2')->with('','');
        //������һ��
        return redirect()->back();
    }
    public function index() {
        $student=student::paginate(5);
        return view('student.index',[
            'student'=>$student,
        ]);
        ;
    }
    public function create(Request $request) {
        $student=new Student();
        if ($request->isMethod('POST')) {
            //1.控制器验证
            /* $this->validate($request, [
             'name'=>'required|min:2|max:10',
             'age'=>'required|integer',
             'sex'=>'required|integer'
            
            ],[
            'required'=>':attribute 必须填写',
            'min'=>':attribute 长度不符合要求',
            'interger'=>':attribute 必须为整数',
            
            
            ],[
            'name'=>'姓名',
            'age'=>'年龄',
            'sex'=>'性别'
            ]); */
            
            //2.validate类验证
            $validate=\Validator::make($request->all() ,[
                'name'=>'required|min:2|max:10',
                'age'=>'required|integer',
                'sex'=>'required|integer'
            
            ],[
                'required'=>':attribute 必须填写',
                'min'=>':attribute 长度不符合要求',
                'interger'=>':attribute 必须为整数',
            
            
            ],[
                'name'=>'姓名',
                'age'=>'年龄',
                'sex'=>'性别'
            ]);
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withInput();//将 $request信息放入input中
            }
            
            $data=$request->all();
            if(Student::create($data)){
                return redirect('stu/index')->with('success','添加成功');
            }else {
                return redirect()->back()->with('error','添加失败');;
            }
        }
        return view('student.create',[
            'student'=>$student
        ]);
        
    }
    public function save(Request $request){
        $data = $request->all();
        
        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->sex = $data['sex'];
        
        if ($student->save()) {
            return redirect('stu/index');
        } else {
            return redirect()->back();
        }
    }  
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($request->isMethod('POST')) {

            $this->validate($request, [
                'name'=>'required|min:2|max:10',
                'age'=>'required|integer',
                'sex'=>'required|integer'
            
            ],[
                'required'=>':attribute 必须填写',
                'min'=>':attribute 长度不符合要求',
                'interger'=>':attribute 必须为整数',
            
            
            ],[
                'name'=>'姓名',
                'age'=>'年龄',
                'sex'=>'性别'
            ]);

            $data = $request->all();
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];

            if ($student->save()) {
                return redirect('stu/index')->with('success', '修改成功-' . $id);
            }
        }


        return view('student.update', [
            'student' => $student
        ]);
    }
    public function detail($id){
        $student = Student::find($id);
        return view('student.detail',[
            'student'=>$student
        ]);
    }
    public function delete($id){
        $student = Student::find($id);
            if($student->delete()){
                return redirect('stu/index')->with('success','删除成功');
            }else {
                return redirect()->back()->with('error','删除失败');;
            }
    }
}