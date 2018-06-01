<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoicePost;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    protected $model;

    public function __construct(Invoice $model)
    {
        $this->model = $model;
    }

    /**
     * 获取发票列表
     *
     * @return $this
     */
    public function index()
    {
        $invoices = $this->model
                         ->where([
                             ['user_id',Auth::id()]
                         ])
                         ->get();
        //dd($invoices);
        return view('invoice.index')->with(['invoice' => $invoices]);
    }

    /**
     * 显示发票的详情
     *
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $invoice = $this->model
                         ->where([['id',$id],['user_id',Auth::id()]])
                         ->first();
        return view('invoice.detail')->with(['invoice' =>$invoice]);
    }

    /**
     * 显示新建发票的页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('invoice.create');
    }

    /**
     * 新建发票
     *
     * @param StoreInvoicePost $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreInvoicePost $request){
        $data = $request->only(['org_name','tax_id','org_addr','org_tel','org_bank','org_account']);
        $data['user_id'] = Auth::id();
        $this->model->create($data);
        return redirect(route('invoice.show'));
    }

    /**
     * 显示修改发票信息表单
     *
     * @param $id
     * @return $this
     */
    public function edit($id){
        $invoice = $this->model
            ->where([
                ['id',$id],
                ['user_id',Auth::id()]
            ])
            ->first();
        return view('invoice.edit')->with(['invoice' => $invoice]);
    }

    /**
     *  显示修改发票信息表单
     *
     * @param StoreInvoicePost $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreInvoicePost $request, $id)
    {
        $data  = $request->only(['org_name','tax_id','org_addr','org_tel','org_bank','org_account']);
        $data['user_id'] = Auth::id();
        $this->model
            ->where([
                ['id', $id],
                ['user_id', Auth::id()]
            ])->update($data);
        return redirect(route('invoice.index'));
    }

    /**
     *  删除发票信息
     *
     * @param $id
     */
    public function destroy($id){
        $this->model
            ->where([
                ['id', $id],
                ['user_id', Auth::id()]
            ])
            ->dalete();
    }

}
