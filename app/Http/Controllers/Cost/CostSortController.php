<?php

namespace App\Http\Controllers\Cost;

use App\Http\Controllers\Controller;
use App\Http\Requests\SortCostRequest;
use App\Models\CostSort;
use App\Models\Products;
use Illuminate\Http\Request;

class CostSortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $items=CostSort::query()->orderByDesc('created_at')->paginate(10);
        $title='ویرایش دسته هزینه ها';
        $about='در این صفحه میتوانید دسته هزینه ها را اضافه و تغییر دهید';
        return view('Cost.CostSort',compact('items','title','about',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن دسته هزینه";
        $about='افزودن دسته هزینه';
        //show create form
        return view('Cost.CostSortAdd', compact('title','about',"Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SortCostRequest $request)
    {
        //2 create new recorde in mySql
        $item= CostSort::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.costSort.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products=Products::all();
        $title = "ویرایش هزینه";
        //1 get 1 record depends on id
        $item = CostSort::query()->findOrFail($id);
        //2 send data edit form
        return view('Cost.CostSortAdd', compact('title','item',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SortCostRequest $request, string $id)
    {
        $item=$request->except('_token','_method');
        //2 update specific recorde in mySql depends on id
        $item = CostSort::query()->where('id', $id)->update($item);
        $about='ویرایش هزینه';
        //3 redirect to index
        return redirect()->route('Admin.costSort.index',compact('item','about'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        CostSort::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.costSort.index');
    }
}
