<?php

namespace App\Http\Controllers;
use App\Address;
use App\Http\Requests\StoreAddressPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    //Address model实例
    protected $model;
    //AddressController构造函数，注入Address model
    public function __construct(Address $model)
    {
        $this->model = $model;
    }
    /*
     显示当前的登录用户的地址列表
     * */
    public function index(){
        $addresses = $this->model
            ->where('user_id', Auth::id())
            ->orderBy('is_default', 'desc')
            ->get();
        //dd($addresses);
        return response()->json($addresses);
    }

    /**
     * 显示地址详情
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $address = $this->model
            ->where([
                ['id', $id],
                ['user_id',  Auth::id()]
            ])
            ->first();
        return response()->json($address);
    }

    /**
     * 显示新建地址表单
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     *  新建地址
     *
     * @param StoreAddress $request
     */
    public function store(StoreAddress $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $this->model->create($data);
    }

    /**
     * 显示修改地址信息表单
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $address = $this->model
            ->where([
                ['id', $id],
                ['user_id', Auth::id()]
            ])
            ->first();
        return view('address.edit')->with(['address' => $address]);
    }


    /**
     * 更新地址信息
     *
     * @param StoreAddress $request
     * @param $id
     */
    public function update(StoreAddressPost $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        unset($data['_token']);
        unset($data['_method']);

        $this->model
            ->where([
                ['id', $id],
                ['user_id', Auth::id()]
            ])
            ->update($data);
    }

    /**
     * 删除地址
     *
     * @param $id
     */
    public function destroy($id)
    {
        $this->model
            ->where([
                ['id', $id],
                ['user_id', Auth::id()]
            ])
            ->delete();
    }
}
