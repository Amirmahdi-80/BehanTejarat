<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\SortRequest;
use App\Models\Products;
use App\Models\Sort;
use Illuminate\Http\Request;

class SortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="مدیریت دسته بندی ها";
        $items= Sort::query()->orderByDesc('id')->paginate(10);
        return view('Products.Sort',compact('title','items',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن دسته بندی جدید";
        //show create form
        return view('Products.FormSort', compact('title',"Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SortRequest $request)
    {
        //2 create new recorde in mySql
        $item = Sort::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.Sort.index');
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
        $title = "ویرایش دسته بندی";
        //1 get 1 record depends on id
        $item = Sort::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.FormSort', compact('title','item',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SortRequest $request, string $id)
    {
        $item=$request->except('_token','_method');
        //2 update specific recorde in mySql depends on id
        $item = Sort::query()->where('id', $id)->update($item);
        //3 redirect to index
        return redirect()->route('Admin.Sort.index',compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Sort::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Sort.index');
    }
}
