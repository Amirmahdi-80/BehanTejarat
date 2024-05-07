<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\SortRequest;
use App\Http\Requests\VahedRequest;
use App\Models\Products;
use App\Models\Vahed;
use Illuminate\Http\Request;

class InitializeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $title="مدیریت واحد ها";
        $items=Vahed::query()->orderByDesc('id')->paginate(10);
        return view('Products.Initialize',compact('title','items',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $title = "افزودن واحد جدید";
        //show create form
        return view('Products.FormInitialize', compact('title',"Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VahedRequest $request)
    {
        //2 create new recorde in mySql
        $item = Vahed::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.Initialize.index');
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
        $title = "ویرایش محصول";
        //1 get 1 record depends on id
        $item = Vahed::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.FormProducts', compact('title','item',"Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VahedRequest $request, string $id)
    {
        $item=$request->all();
        //2 update specific recorde in mySql depends on id
        $item = Vahed::query()->where('id', $id)->update($item);
        //3 redirect to index
        return redirect()->route('Admin.Initialize.index',compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Vahed::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Initialize.index');
    }
}
