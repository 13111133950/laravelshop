<form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">姓名</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" placeholder="请输入学生姓名" value='{{old('name')?old('name'):$student->name}}'>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <!--   这个报错出现在于Laravel框架为了防止跨域请求攻击（CSRF）而为用户生成的随机令牌，post请求如果没有验证token，就出现上图的报错信息。解决方法：在form表单中添加一个隐藏域，携带token参数即可 -->
                            </div>
                            <div class="col-sm-5">
                                <p class="form-control-static text-danger">{{$errors->first('name')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">年龄</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="age" placeholder="请输入学生年龄" value='{{old('age')?old('age'):$student->age}}'>
                            </div>
                            <div class="col-sm-5">
                                <p class="form-control-static text-danger">{{$errors->first('age')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">性别</label>

                            <div class="col-sm-5">
                                @foreach($student->sex() as $ind=>$val)
                                    <label class="radio-inline">
                                        <input type="radio" name="sex"
                                               {{ isset($student->sex) && $student->sex == $ind ? 'checked' : ''  }}
                                               value="{{ $ind }}"> {{ $val }}
                                    </label>
                                @endforeach
                            </div>
                            <div class="col-sm-5">
                                <p class="form-control-static text-danger">{{$errors->first('sex')}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </form>