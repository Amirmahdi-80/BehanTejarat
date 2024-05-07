<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="مدیریت سفارشات";
        $items= Orders::query()->orderByDesc('id')->paginate(10);
        return view('OrderPanel',compact('title','items',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdersRequest $request)
    {
        $item=$request->all();
        $item['Vaziat']='تایید شده';
        $item = Orders::query()->create($request->all());
        //3 redirect to index
        return view('Admin.Orders',compact('item'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Products=Products::all();
        $title = "مشاهده سفارش";
        //1 get 1 record depends on id
        $item = Orders::query()->findOrFail($id);
        //2 send data edit form
        return view('OrderShow2', compact('title','item',"Products"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products=Products::all();
        $title = "مشاهده سفارش";
        //1 get 1 record depends on id
        $item = Orders::query()->findOrFail($id);
        //2 send data edit form
        return view('OrderShow', compact('title','item',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdersRequest $request, string $id)
    {
        $item=$request->only('Vaziat');
        $item = Orders::query()->where('id', $id)->update($item);
        //3 redirect to index
        $items= Orders::query()->orderByDesc('id')->paginate(10);
        $title="سفارش آپدیت شد";
        return view('OrderPanel',compact('item','title','items'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Orders::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Orders.index');
    }
}
