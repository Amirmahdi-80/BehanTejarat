<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsRequest;
use App\Http\Requests\CarTransfersRequest;
use App\Models\Car;
use App\Models\CarTransfer;
use App\Models\Driver;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarTransfersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $where = [];
//        if ($request->has("car")) {
//            $where["car_id"] = $request->get("car");
//        }
//
//        if ($request->has("driver")) {
//            $where["driver_id"] = $request->get("driver");
//        }
//
//        $items = CarTransfer::query()->where($where)->with('car')->with('driver')->paginate();
        $Products=Products::all();
        $drivers = Driver::all();
        $cars = Car::all();
        $items=CarTransfer::query()->orderByDesc('created_at')->paginate(10);
        $title='ویرایش ورود خروج خودرو ها';
        $about='در این صفحه میتوانید ورود و خروج را کنترل کنید';
        return view('Cars.CarsTransfer',compact('items','title','about','drivers','cars','Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن ورود یا خروج خودرو";
        $cars = Car::all();
        $drivers = Driver::all();
        //show create form
        return view('Cars.CarsAdd2', compact('title','cars','drivers','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarTransfersRequest $request)
    {
        //2 create new recorde in mySql
        $item= CarTransfer::query()->create($request->all());
        $item2=Car::where('CarName', $item->car_id)
            ->update(['Kilometer' => $item->EnterDistance]);
        //3 redirect to index
        return redirect()->route('Admin.CarsTransfer.index',compact('item','item2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        $Products=Products::all();
        $title = "مشاهده خودرو";
        $about="شما میتوانید در این صفحه خودرو های موجود در شرکت را مشاهده کنید";
        //1 get 1 record depends on id
        $cars = Car::all();
        $drivers = Driver::all();
        $item = CarTransfer::query()->findOrFail($id);
        //2 send data edit form
        return view('Cars.CarTransferShow', compact('title','item','about','cars','drivers',"Products"));
    }
    public function edit(string $id)
    {
        $Products=Products::all();
        $title = "ویرایش خودرو";
        $about="شما میتوانید در این صفحه خودرو های موجود در شرکت را ویرایش کنید";
        //1 get 1 record depends on id
        $cars = Car::all();
        $drivers = Driver::all();
        $item = CarTransfer::query()->findOrFail($id);
        //2 send data edit form
        return view('Cars.CarsAdd2', compact('title','item','about','cars','drivers',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarTransfersRequest $request, string $id)
    {
        $item= CarTransfer::query()->where('id', $id)->update($request->except('_token','_method'));
        //3 redirect to index
        return redirect()->route('Admin.CarsTransfer.index',compact('item'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        CarTransfer::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.CarsTransfer.index');
    }
}
