<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAdminPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class LoginController extends Controller
{
    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    /**
     * 显示管理员列表
     */
    public function index()
    {
        $admins = $this->model
            ->select('id', 'name', 'email')
            ->get();
        return view('admin.admin.index')->with(['admins' => $admins]);
    }

    /**
     * 显示创建管理员表单
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * 创建管理员
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data =  $request->only(['name','email','password']);
        $data['password'] = Hash::make($data['password']);
        $this->model->create($data);
        return redirect(route('admin.index'));
    }

    /**
     * 显示管理员详情
     *
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $admin = $this->model
            ->select('id', 'name', 'email')
            ->where([
                ['id', $id]
            ])
            ->first();
        return view('admin.admin.detail')->with(['admin' => $admin]);
    }

    /**
     * 显示编辑管理员信息表单
     *
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $data = $this->model
            ->select('id', 'name', 'email')
            ->where([
                ['id', $id]
            ])
            ->first();
        return view('admin.admin.edit')->with(['admin' => $data]);
    }

    /**
     * 更新管理员信息
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['email','name']);
        $this->model
            ->where([
                ['id',$id]
            ])
            ->update($data);
        return redirect(route('admin.show', ['id' => $id]));
    }

    /**
     * 删除管理员信息
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->model
            ->destroy($id);
        return redirect(route('admin.index'));
    }

    /**
     * 显示登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * 登录验证
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
       $data = $request->only(['email', 'password']);
       $data['password'] = Hash::make($data['password']);
       print_r($data);exit;
       $admin = $this->model
                     ->where([
                         ['email', $data['email']],
                         ['password', $data['password']]
                     ])
                     ->first();

       if($admin){
           session([
               'admin_id' => $admin['id'],
               'email' => $admin['email'],
               'name' => $admin['name'],
               'status' => 1]);
           return redirect(route('admin.admin'));
       }
       return redirect(route('admin.login.form'));
    }

    /**
     * 退出登录
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
   public function logout()
   {
        session()->flush();
        return redirect(route('admin.login'));
   }
}