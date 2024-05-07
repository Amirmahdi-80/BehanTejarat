<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaminRequest;
use App\Models\Products;
use App\Models\Tamin;
use Illuminate\Http\Request;

class TaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="تامین کنندگان";
        $about="شما میتوانید در این صفحه تامین کنندگان در شرکت را ویرایش کنید";
        $items= Tamin::query()->orderByDesc('id')->paginate(10);
        return view('Products.Tamin',compact('title','items','about',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن تامین کنندگان";
        //show create form
        return view('Products.TaminAdd', compact('title','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaminRequest $request)
    {
        //2 create new recorde in mySql
        $item = Tamin::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.Tamin.index');
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
        $title = "ویرایش تامین کنندگان";
        //1 get 1 record depends on id
        $item = Tamin::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.TaminAdd', compact('title','item',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=$request->except('_token','_method');
        //2 update specific recorde in mySql depends on id
        $item = Tamin::query()->where('id', $id)->update($item);
        //3 redirect to index
        return redirect()->route('Admin.Tamin.index',compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Tamin::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Tamin.index');
    }
}
