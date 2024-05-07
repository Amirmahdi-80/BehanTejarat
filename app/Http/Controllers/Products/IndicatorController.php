<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndicatorRequest;
use App\Models\Indicator;
use App\Models\Link;
use App\Models\Products;
use App\Models\Tamin;
use App\Models\Vahed;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Products = Products::all();
        $Vaheds = Vahed::all();
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $items = Link::query()->orderByDesc('id')
            ->where('PName', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->paginate(15);
        $about = 'جست و جو شما با موفقیت انجام شد،اگر اطلاعاتی نمایش داده نشد بدین منظور است که داده ای یافت نشده است';
        $title = 'مدیریت شاخص سازی';
        // Return the search view with the resluts compacted
        return view('Products.Indicator', compact('items', 'about', 'title', "Products", "Vaheds"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(IndicatorRequest $request)
    {
        //2 create new recorde in mySql
        $item = Indicator::query()->create($request->all());
        $Vaheds = Vahed::all();
        $Tamin = Tamin::all();
        //3 redirect to index
        return redirect()->route('Admin.Indicators.index', compact('Vaheds','Tamin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Tamin=Tamin::all();
        $Products = Products::all();
        $Vaheds = Vahed::all();
        $title = "ویرایش شاخص";
        //1 get 1 record depends on id
        $item = Link::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.IndicatorAdd', compact('title', 'item', 'Vaheds', "Products",'Tamin'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(IndicatorRequest $request, string $id)
    {
        $item = $request->except('_token','_method');
        //2 update specific recorde in mySql depends on id
        $item = Indicator::query()->where('id', $id)->update($item);
        $Vaheds = Vahed::all();
        $title = 'ویرایش شد';
        $about = 'ویرایش شاخص';
        //3 redirect to index
        return redirect()->route('Admin.Indicator.index', compact('item', 'about', 'title', "Vaheds"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Indicator::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Indicator.index');
    }
}
