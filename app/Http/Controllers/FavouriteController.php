<?php

namespace App\Http\Controllers;

use App\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
protected $model;

public function __construct(Favourite $model)
{
    $this->model = $model;
}

    /**
     * 显示收藏列表
     *
     * @return $this
     */
    public function index()
    {
        $favourites = $this->model
            ->join('users', 'favourites.user_id', '=', 'users.id')
            ->Join('items', 'favourites.items_id', '=', 'items.id')
            ->select('items.name', 'items.spu', 'items.sku', 'items.price', 'items.cover_image')
            ->where('user_id', Auth::id())
            ->get();
        return view('center.favourite.index')->with(['favourites' => $favourites]);
    }


    //添加收藏
    public function store(Request $request)
    {
        $data = $request->only(['user_id', 'item_id']);
        $this->model->create($data);
        return redirect(route('favourite.index'));;
    }

    // 移出收藏
    public function destroy($id)
    {
        $this->model
            ->destroy($id);
        return redirect(route('favourite.index'));
    }
}
