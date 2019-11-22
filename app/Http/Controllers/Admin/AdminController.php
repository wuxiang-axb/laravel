<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCreateUpdateRequest;
use App\Admin;
//后台管理员控制器
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //管理员首页
    public function index()
    {
        $admins = Admin::paginate(2);
      
        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //字符串数组化
        parse_str($_POST['str'],$arr);

        $message = [
            'name.required'=>'请输入用户名',
            'pass.required'=>'请输入密码',
            'name.unique'=>'用户名已存在',
            'pass.same'=>'两次密码不一致',
            'pass.between'=>'密码长度不在6-12位之间',
        ];
   
        //使用laravel的表单验证
        $validator = \validator::make($arr,$rules,$message);

        //开始验证
        if($validator->passes()){
            $arr['time'] = time();
            $arr['pass'] = bcrypt($arr['pass']);
            unset($arr['repass']);
            if(\DB::table('admin')->insert($arr)){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            return $validator->getMessageBag()->getMessages();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCreateUpdateRequest $request, Admin $admin)
    {
        $request['pass'] = md5($request['pass']);
       // dd($request->all());
        $admin->update($request->all());
        return redirect(route('admin.edit',$admin));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect(route('admin.index'));
    }
}
