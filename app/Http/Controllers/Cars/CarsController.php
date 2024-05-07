<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsRequest;
use App\Models\Car;
use App\Models\CarTransfer;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="خودروها ";
        $about="شما میتوانید در این صفحه خودرو های موجود در شرکت را ویرایش کنید";
        $items= Car::query()->orderByDesc('id')->paginate(10);
        return view('Cars.Cars',compact('title','items','about','Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن خودرو";
        //show create form
        return view('Cars.CarsAdd', compact('title','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsRequest $request)
    {
        $inputs = $request->all();
        if ($request->has("image")) {
            $inputs["image"] = $request->file('image')->store("Cars/" . $this->datePath());
        }else{
            unset($inputs["image"]);
        }
        if ($request->has("BimeSales")) {
            $inputs["BimeSales"] = $request->file('BimeSales')->store("Cars/BimeSales" . $this->datePath());
        }else{
            unset($inputs["BimeSales"]);
        }
        if ($request->has("CarCard")) {
            $inputs["CarCard"] = $request->file('CarCard')->store("Cars/CarCard" . $this->datePath());
        }else{
            unset($inputs["CarCard"]);
        }
        if ($request->has("BargSabz")) {
            $inputs["BargSabz"] = $request->file('BargSabz')->store("Cars/BargSabz" . $this->datePath());
        }else{
            unset($inputs["BargSabz"]);
        }
        if ($request->has("Badane")) {
            $inputs["Badane"] = $request->file('Badane')->store("Cars/Badane" . $this->datePath());
        }else{
            unset($inputs["Badane"]);
        }
        $item = Car::query()->create($inputs);
        return redirect()->route('Admin.Cars.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products=Products::all();
        $title = "ویرایش خودرو";
        $about="شما میتوانید در این صفحه خودرو های موجود در شرکت را ویرایش کنید";
        //1 get 1 record depends on id
        $item = Car::query()->findOrFail($id);
        //2 send data edit form
        return view('Cars.CarsAdd', compact('title','item','about','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarsRequest $request, string $id)
    {
        $item = Car::query()->findOrFail($id);
        $inputs = $request->except('_token','_method');
        if ($request->has("image")) {
            $inputs["image"] = $request->file('image')->store("Cars/" . $this->datePath());
        }
        if ($request->has("BimeSales")) {
            $inputs["BimeSales"] = $request->file('BimeSales')->store("Cars/BimeSales" . $this->datePath());
        }
        if ($request->has("CarCard")) {
            $inputs["CarCard"] = $request->file('CarCard')->store("Cars/CarCard" . $this->datePath());
        }
        if ($request->has("BargSabz")) {
            $inputs["BargSabz"] = $request->file('BargSabz')->store("Cars/BargSabz" . $this->datePath());
        }
        if ($request->has("Badane")) {
            $inputs["Badane"] = $request->file('Badane')->store("Cars/Badane" . $this->datePath());
        }
        $item->update($inputs);

        return redirect()->route('Admin.Cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Car::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Cars.index');
    }
    private function datePath()
    {
        $now = Jalalian::now();

        return $now->year . "/" . $now->month . "/" . $now->day;
    }
}
