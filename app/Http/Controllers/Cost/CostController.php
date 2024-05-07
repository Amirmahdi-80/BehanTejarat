<?php

namespace App\Http\Controllers\Cost;

use App\Http\Controllers\Controller;
use App\Http\Requests\CostRequest;
use App\Models\Car;
use App\Models\Cost;
use App\Models\CostSort;
use App\Models\Products;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index()
    {
        $Products=Products::all();
        $items = Cost::query()->orderByDesc('created_at')->paginate(10);
        $title = 'هزینه ها';
        $about = 'در این صفحه میتوانید هزینه ها را اضافه و تغییر دهید';
        return(view('Cost.Cost',compact('title','items','about',"Products")));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن هزینه";
        $about = 'افزودن هزینه';
        $Sorts = CostSort::all();
        $Cars = Car::all();
        //show create form
        return view('Cost.CostAdd', compact('title', 'about', 'Sorts', 'Cars',"Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CostRequest $request)
    {
        //2 create new recorde in mySql
        $item = Cost::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.cost.index');
    }

    public function show(string $id)
    {
        $Products=Products::all();
        $title = "مشاهده هزینه";
        $about = "شما میتوانید در این صفحه هزینه موجود در شرکت را مشاهده کنید";
        //1 get 1 record depends on id
        $item = Cost::query()->findOrFail($id);
        //2 send data edit form
        return view('Cost.CostShow', compact('title', 'item', 'about',"Products"));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $Products=Products::all();
        $title = "ویرایش هزینه";
        //1 get 1 record depends on id
        $item = Cost::query()->findOrFail($id);
        $Sorts = CostSort::all();
        $Cars = Car::all();
        //2 send data edit form
        return view('Cost.CostAdd', compact('title', 'item', 'Sorts', 'Cars',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CostRequest $request, string $id)
    {
        $item = $request->except('_token','_method');
        //2 update specific recorde in mySql depends on id
        $item = Cost::query()->where('id', $id)->update($item);
        $title = 'ویرایش شد';
        $about = 'ویرایش هزینه';
        //3 redirect to index
        return redirect()->route('Admin.cost.index', compact('item', 'about', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Cost::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.cost.index');
    }
}
