<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\CarTransfer;
use App\Models\Driver;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Soal;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Driver=Driver::all();
        $CarT=CarTransfer::query()->orderByDesc('created_at')->paginate(10);
        $Soal=Soal::query()->orderByDesc('created_at')->paginate(5);
        $slides=Slider::query()->orderByDesc('created_at')->paginate(5);
        $Cars=Car::query()->orderByDesc('created_at')->paginate(10);
        $items= Products::query()->orderByDesc('id')->paginate(10);
        $title='بهان تجارت آفرین';
        return view('Mahsulat',compact('title','items','Cars','slides','Soal','CarT','Driver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdersRequest $request)
    {
        $item2=$request->all();
        $item2['Vaziat']='در انتظار تایید';
        $item2=Orders::query()->create($item2);
        $item=Products::where('ProductComment', $item2->ProductComment)
            ->update(['ProductNo' => $item2->Storage]);
        $title = "تایید نهایی";
        //3 redirect to index
        return view('Peygiri',compact('title','item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(\auth()->check()){
            $title = "ثبت سفارش";
            //1 get 1 record depends on id
            $items = Products::query()->findOrFail($id);
            //2 send data edit form
            return view('Buy', compact('title','items'));
        }
        return view('Auth.login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
