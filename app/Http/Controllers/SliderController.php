<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Products;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="اسلاید شو";
        $about="شما میتوانید در این صفحه اسلایدشو شرکت را ویرایش کنید";
        $items= Slider::query()->orderByDesc('id')->paginate(10);
        return view('Slider.Slideshow',compact('title','items','about',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن اسلایدر";
        //show create form
        return view('Slider.SlideAdd', compact('title',"Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $inputs = $request->except('_token','_method');
        if ($request->has("image")) {
            $inputs["image"] = $request->file('image')->store("Slides/" . $this->datePath());
        }else{
            unset($inputs["image"]);
        }
        $item = Slider::query()->create($inputs);
        return redirect()->route('Admin.Slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //1 delete specific recorde in mySql depends on id
        Slider::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Slider.index');
    }
    private function datePath()
    {
        $now = Jalalian::now();

        return $now->year . "/" . $now->month . "/" . $now->day;
    }
}
