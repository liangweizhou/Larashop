<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;

class UserController extends Controller
{
    //User model实例
    protected $model;
    //UserController构造函数，注入User model
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * 显示用户的详情
     *
     * @param $id
     * @return $this
     */
    public function show()
    {
        $info = $this->model
                     ->select('id', 'name', 'sex', 'birth_date', 'email', 'mobile', 'avatar', 'balance', 'points', 'level')
                     ->where([
                         ['id',Auth::id()]
                     ])
                     ->first();
        return view('center.info.details')->with(['info' => $info]);

    }

    /**
     * 显示编辑用户信息表单
     *
     * @param $id
     * @return $this
     */
    public function edit()
    {
        $info = $this->model
                     ->select('id', 'name','sex', 'birth_date', 'email', 'mobile','avatar')
                     ->where([
                        // ['id', $id],
                         ['id', Auth::id()]
                     ])
                     ->first();
        return view('center.info.edit')->with(['info' => $info]);
    }

    /**
     * 更新用户信息
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $info = $request->only(['id','name', 'sex', 'birth_date', 'email', 'mobile', 'avatar']);
        $this->model
            ->where('id', Auth::id())
            ->update($info);
        return redirect(route('userinfo.show', ['id' => $info['id']]));

    }
}
