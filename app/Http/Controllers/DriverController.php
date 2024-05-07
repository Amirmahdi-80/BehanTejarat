<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Models\Driver;
use App\Models\Products;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use Spatie\Html\Elements\P;

class DriverController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title='صفحه ویرایش رانندگان';
        $about='در این صفحه میتوانید رانندگان را ویرایش کنید';
        $items=Driver::query()->orderByDesc('id')->paginate(config('app.admin_paginate_size'));
        return view('Admin.Driver.Driver',compact('items','about','title',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن راننده جدید";
        //show create form
        return view('Admin.Driver.DriverAdd', compact('title',"Products"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        $inputs = $request->all();
        if ($request->has("image")) {
            $inputs["image"] = $request->file('image')->store("Drivers/" . $this->datePath());
        }else{
            unset($inputs["image"]);
        }
        if ($request->has("DriverLicence")) {
            $inputs["DriverLicence"] = $request->file('DriverLicence')->store("Drivers/Licences/" . $this->datePath());
        }else{
            unset($inputs["DriverLicence"]);
        }
        $item = Driver::query()->create($inputs);
        return redirect()->route('Admin.Driver.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products=Products::all();
        $title = "ویرایش راننده";
        //1 get 1 record depends on id
        $item = Driver::query()->findOrFail($id);
        //2 send data edit form
        return view('Admin.Driver.DriverAdd', compact('title','item','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, string $id)
    {
        $item = Driver::query()->findOrFail($id);
        $inputs = $request->except('_token','_method');
        if ($request->has("image")) {
            $inputs["image"] = $request->file('image')->store("Drivers/" . $this->datePath());
        }
        if ($request->has("DriverLicence")) {
            $inputs["DriverLicence"] = $request->file('DriverLicence')->store("Drivers/Licences/" . $this->datePath());
        }
        $item->update($inputs);

        return redirect()->route('Admin.Driver.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Driver::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Driver.index');
    }
    private function datePath()
    {
        $now = Jalalian::now();

        return $now->year . "/" . $now->month . "/" . $now->day;
    }
}
