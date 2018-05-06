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


    public function index(){
        $invoices = $this->model
            ->where('user_id',Auth::id())
            ->get();
        return view('invoice.index')->with(['invoice' => $invoices]);
    }

    public function show($id){
        //显示发票的详情
        $invoice = $this->model
                         ->where([['id',$id],['user_id',Auth::id()]])
                         ->first();
        return view('invoice.detail')->with(['invoice' =>$invoice]);
    }

    public function create(){
        //显示新建发票表单
        return view('invoice.create');
    }

    public function store(StoreInvoicePost $request){
        //新建发票
        $data = $request->only(['org_name','tax_id','org_addr','org_tel','org_bank','org_account']);
        $data['user_id'] = Auth::id();
        $this->model->create($data);
        return redirect(route('invoice.show'));
    }

    //显示修改发票信息表单
    public function edit($id){
        $invoice = $this->model
            ->where([
                ['id',$id],
                ['user_id',Auth::id()]
            ])
            ->first();
        return view('invoice.edit')->with(['invoice' => $invoice]);
    }

    //更新发票信息
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

    //删除发票信息
    public function destroy($id){
        $this->model
            ->where([
                ['id', $id],
                ['user_id', Auth::id()]
            ])
            ->dalete();
    }

}
