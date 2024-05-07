<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutMeRequest;
use App\Models\AboutMe;
use App\Models\Products;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="امیرمهدی اسدی";
        $about="تو این صفحه میتونم اطلاعات خودم رو بارگذاری کنم";
        $items= AboutMe::query()->orderByDesc('id')->paginate(10);
        return view('About.AboutMePanel',compact('title','items','about','Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن اطلاعات";
        //show create form
        return view('About.AboutMeAdd', compact('title','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutMeRequest $request)
    {
        $inputs = $request->all();
        if ($request->has("Resume")) {
            $inputs["Resume"] = $request->file('Resume')->store("Resume/" . $this->datePath());
        }else {
            unset($inputs["Resume"]);
        }
        $item = AboutMe::query()->create($inputs);
        return redirect()->route('Admin.AboutMe.index');
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
        $Products=Products::all();
        $title = "ویرایش اطلاعات";
        $about="میتونم تو این صفحه اطلاعاتم رو ویرایش کنم";
        //1 get 1 record depends on id
        $item = AboutMe::query()->findOrFail($id);
        //2 send data edit form
        return view('About.AboutMeAdd', compact('title','item','about','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutMeRequest $request, string $id)
    {
        $item = AboutMe::query()->findOrFail($id);
        $inputs = $request->except('_token','_method');
        if ($request->has("Resume")) {
            $inputs["Resume"] = $request->file('Resume')->store("Resume/" . $this->datePath());
        }
        $item->update($inputs);

        return redirect()->route('Admin.AboutMe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        AboutMe::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.AboutMe.index');
    }
    private function datePath()
    {
        $now = Jalalian::now();

        return $now->year . "/" . $now->month . "/" . $now->day;
    }
}
