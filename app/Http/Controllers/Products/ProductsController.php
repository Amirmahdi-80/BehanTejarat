<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Out;
use App\Models\Products;
use App\Models\Sort;
use App\Models\Vahed;
use App\Models\Vorud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Products=Products::all();
        $Vaheds=Vahed::all();
        $Sorts=Sort::all();
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $items = Products::query()->orderBy('ProductId')
            ->where('ProductId', 'LIKE', "%{$search}%")
            ->orWhere('ProductComment', 'LIKE', "%{$search}%")
            ->orWhere('Sort', 'LIKE', "%{$search}%")
            ->paginate(1000);
        $title="مدیریت محصولات";
        // Return the search view with the resluts compacted
        return view('Products.Products', compact('items', 'Vaheds', 'title','Products','Sorts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $Vaheds=Vahed::all();
        $Sorts=Sort::all();
        $title = "افزودن محصول جدید";
        //show create form
        return view('Products.FormProducts', compact('title','Vaheds','Sorts','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $request)
    {
        //2 create new recorde in mySql
        $inputs = $request->all();
        if ($request->has("ProductImage")) {
            $inputs["ProductImage"] = $request->file('ProductImage')->store("ProductImage/" . $this->datePath());
        }else{
            unset($inputs["image"]);
        }
        $item=Products::query()->create($inputs);
        //3 redirect to index
        return redirect()->route('Admin.Products.index');
    }
    public function show(string $id)
    {
        $PricKol=
        $i2=0;
        $j2=0;
        $k2=0;
        $i=0;
        $j=0;
        $k=0;
        $Out=Out::all();
        $Vorud=Vorud::all();
        $item = Products::query()->findOrFail($id);
        $Products=Products::all();
        $title = "مشاهده جزئیات تامین محصول";
        return view('Products.ProductDetail', compact('title','item','Vorud','i','j','k','Products','i2','j2','k2','Out'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Vaheds=Vahed::all();
        $Sorts=Sort::all();
        $title = "ویرایش محصول";
        //1 get 1 record depends on id
        $item = Products::query()->findOrFail($id);
        $Products=Products::all();
        //2 send data edit form
        return view('Products/FormProducts', compact('title','item','Vaheds','Sorts','Products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, string $id)
    {
        //2 update specific recorde in mySql depends on id
        $inputs = $request->except('_token','_method');
        if ($request->has("ProductImage")) {
            $inputs["ProductImage"] = $request->file('ProductImage')->store("ProductImage/" . $this->datePath());
        }
        $item=Products::query()->where('id', $id)->update($inputs);
        //3 redirect to index
        return redirect()->route('Admin.Products.index',compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Products::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Products.index');
    }
    private function datePath()
    {
        $now = Jalalian::now();

        return $now->year . "/" . $now->month . "/" . $now->day;
    }
}
