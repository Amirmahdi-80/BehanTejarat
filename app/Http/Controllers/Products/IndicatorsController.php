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

class IndicatorsController extends Controller
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
        $items = Indicator::query()->orderByDesc('id')
            ->where('Product', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->paginate(15);
        $about = 'جست و جو شما با موفقیت انجام شد،اگر اطلاعاتی نمایش داده نشد بدین منظور است که داده ای یافت نشده است';
        $title = 'مدیریت شاخص ها';
        // Return the search view with the resluts compacted
        return view('Products.Indicators', compact('items', 'about', 'title', "Products", "Vaheds"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Links=Link::all();
        $Vaheds = Vahed::all();
        $Products = Products::all();
        $Tamin=Tamin::all();
        $title = "مشاهده شاخص";
        $about = "شما میتوانید در این صفحه شاخص را مشاهده کنید";
        //1 get 1 record depends on id
        $item = Indicator::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.IndicatorsShow', compact('title', 'item', 'about', "Products", 'Vaheds','Links','Tamin'));
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
        $item = Indicator::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.IndicatorEdit', compact('title', 'item', 'Vaheds', "Products",'Tamin'));
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
        return redirect()->route('Admin.Indicators.index', compact('item', 'about', 'title', "Vaheds"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Indicator::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Indicators.index');
    }
}
