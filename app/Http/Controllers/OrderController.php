<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use App\Address;
use App\Invoice;
use App\User;
use App\Payment;
use App\Item;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    protected $model;

    /**
     * OrderController constructor.
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * 显示订单列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->model
            ->select('id', 'total_amount', 'discount', 'freight', 'payment', 'items', 'address', 'invoice')
            ->where([
                ['user_id', Auth::id()]
            ])
            ->get();

        // print_r($orders);
        return view('center.order.index')->with(['orders' => $orders]);
    }

    /**
     * 显示填写并核对订单信息页面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        // cart/index.blade.php中<input name="item_ids[]" type="checkbox" value="{{ $item['id'] }}">如果被选中则其value中存储的item_id会传过来
        // 获取items
        $items = Cart::select('carts.item_id', 'carts.amount', 'items.name', 'items.price', 'items.cover_img')
            ->join('items', 'items.id', '=', 'carts.item_id')
            ->whereIn('carts.item_id', $request->input('item_ids', []))
            ->where([
                ['carts.user_id', Auth::id()]
            ])
            ->get();
        // 算总金额
        $totalPay = 0.0;
        foreach ($items as $item)
        {
            $totalPay += $item['amount'] * $item['price'];
        }

        // 获取地址
        $addresses = Address::select('id', 'tag', 'is_default', 'consignee_name', 'consignee_mobile', 'province', 'city', 'district', 'detail')
            ->where([
                ['user_id', Auth::id()]
            ])
            ->get();

        // 发票信息
        $invoices = Invoice::select('id', 'tax_id', 'org_name', 'org_addr', 'org_tel', 'org_bank', 'org_account')
            ->where([
                ['user_id', Auth::id()]
            ])
            ->get();

        return view('center.order.create')->with(['items' => $items, 'addresses' => $addresses, 'invoices' => $invoices, 'totalPay' => $totalPay]);
    }

    /**
     * 提交订单并余额支付
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // 获取items
        $items = Cart::select('carts.item_id', 'carts.amount', 'items.id', 'items.name', 'items.price', 'items.cover_img', 'items.imgs', 'items.spu', 'items.sku')
            ->join('items', 'items.id', '=', 'carts.item_id')
            ->whereIn('carts.item_id', $request->input('item_ids', []))
            ->where([
                ['carts.user_id', Auth::id()]
            ])
            ->get();
        // 算总金额
        $totalPay = 0.0;
        foreach ($items as $item)
        {
            $totalPay += $item['amount'] * $item['price'];
        }

        // 获取地址
        $address = Address::select('id', 'tag', 'is_default', 'consignee_name', 'consignee_mobile', 'province', 'city', 'district', 'detail')
            ->where([
                ['user_id', Auth::id()],
                ['id', $request->input('address_id', 0)]
            ])
            ->first();

        // 发票信息
        $invoice = Invoice::select('id', 'tax_id', 'org_name', 'org_addr', 'org_tel', 'org_bank', 'org_account')
            ->where([
                ['user_id', Auth::id()],
                ['id', $request->input('invoice_id', 0)]
            ])
            ->first();

        /**
         * 1. 商品库存更新
         * 2. users表余额字段balance减去$totalPay
         * 3. 生成orders表信息
         * 4. payments表新增支付记录
         * 5. carts表删除相应的已付款item_ids
         *
         * @TODO 使用事务机制
         */
        // 1. 商品库存更新
        // @TODO 检查库存是否大于0，否则不可售卖
        foreach ($items as $item)
        {
            Item::find($item['id'])->decrement('remaining_amount', $item['amount']);
        }

        // 2. users表余额字段balance减去$totalPay
        // @TODO 需要检查账户余额是否大于$totalPay，使用try语法，因为数据库中balance字段是无符号的，decrement方法将balance减为负值会报错
        //
        User::find(Auth::id())->decrement('balance', $totalPay);

        // 3. 生成orders表信息
        $order = [
            'user_id' => Auth::id(),
            'total_amount' => $totalPay,
            'discount' => 0.0,
            'freight' => 0.0,
            'payment' => $totalPay,
            'items' => json_encode($items->toArray()),
            'address' => json_encode($address->toArray()),
            'invoice' => json_encode($invoice->toArray())
        ];
        $orderId = $this->model->insertGetId($order);

        // 4. payments表新增支付记录
        $payment = [
            'user_id' => Auth::id(),
            'order_id' => $orderId,
            'type' => 'balance',
            'amount' => $totalPay
        ];
        Payment::create($payment);

        // 5. carts表删除相应的已付款item_ids
        Cart::whereIn('item_id', $request->input('item_ids', []))
            ->where([
                ['user_id', Auth::id()]
            ])
            ->delete();

        // 返回订单列表页
        return redirect(route('order.index'));
    }
}
