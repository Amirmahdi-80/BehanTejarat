<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyFavoriteRequest;
use App\Models\MyFavorite;
use App\Models\Products;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class MyFavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="علاقه مندی های من";
        $about="تو این صفحه میتونم علاقه مندی های خودم رو بارگذاری کنم";
        $items= MyFavorite::query()->orderByDesc('id')->paginate(10);
        return view('About.MyFavorite',compact('title','items','about','Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن علاقه مندی";
        //show create form
        return view('About.MyFavoriteAdd', compact('title','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MyFavoriteRequest $request)
    {
        $inputs = $request->all();
        if ($request->has("Pic")) {
            $inputs["Pic"] = $request->file('Pic')->store("PicFavorite/" . $this->datePath());
        }else {
            unset($inputs["Pic"]);
        }
        $item = MyFavorite::query()->create($inputs);
        return redirect()->route('Admin.Favorite.index');
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
        $title = "ویرایش علاقه مندی ها";
        $about="میتونم تو این صفحه علاقه مندی هام رو ویرایش کنم";
        //1 get 1 record depends on id
        $item = MyFavorite::query()->findOrFail($id);
        //2 send data edit form
        return view('About.MyFavoriteAdd', compact('title','item','about','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MyFavoriteRequest $request, string $id)
    {
        $item = MyFavorite::query()->findOrFail($id);
        $inputs = $request->except('_token','_method');
        if ($request->has("Pic")) {
            $inputs["Pic"] = $request->file('Pic')->store("PicFavorite/" . $this->datePath());
        }else{
            unset($inputs["Pic"]);
        }
        $item->update($inputs);

        return redirect()->route('Admin.Favorite.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        MyFavorite::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Favorite.index');
    }
    private function datePath()
    {
        $now = Jalalian::now();

        return $now->year . "/" . $now->month . "/" . $now->day;
    }
}
