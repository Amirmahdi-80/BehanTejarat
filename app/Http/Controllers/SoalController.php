<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoalRequest;
use App\Models\Products;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $items = Soal::query()->orderByDesc('created_at')->paginate(10);
        $title = 'سوالات متداول';
        $about = 'در این صفحه میتوانید سوالات متداول را ویرایش،حذف و یا اضافه کنید';
        return(view('Soal.Soal',compact('title','items','about',"Products")));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن سوال";
        $about = 'سوال اضافه کنید';
        //show create form
        return view('Soal.SoalAdd', compact('title', 'about',"Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SoalRequest $request)
    {
        //2 create new recorde in mySql
        $item = Soal::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.Soal.index');
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
        $title = "ویرایش سوال";
        //1 get 1 record depends on id
        $item = Soal::query()->findOrFail($id);
        //2 send data edit form
        return view('Soal.SoalAdd', compact('title', 'item','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SoalRequest $request, string $id)
    {
        $item = $request->only(['Question','Answer']);
        //2 update specific recorde in mySql depends on id
        $item = Soal::query()->where('id', $id)->update($item);
        $title = 'ویرایش شد';
        $about = 'ویرایش سوال';
        //3 redirect to index
        return redirect()->route('Admin.Soal.index', compact('item', 'about', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Soal::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Soal.index');
    }
}
