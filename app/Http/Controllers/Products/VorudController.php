<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\VorudRequest;
use App\Models\CarTransfer;
use App\Models\Products;
use App\Models\Tamin;
use App\Models\Vorud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VorudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products=Products::all();
        $items=Vorud::query()->orderByDesc('TName')->paginate(10);
        $about="شما در این صفحه میتوانید ورودی محصول یا محصولات را تعریف کنید";
        $title='تعریف ورودی';
        return view('Products.Vorud',compact('items','about','title',"Products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products=Products::all();
        $Tamin=Tamin::all();
        $about="در این صفحه میتوانید محصولات را اضافه کنید";
        $title='افزودن محصول یا محصولات';
        return view('Products.VorudAdd',compact('title','about','Tamin','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VorudRequest $request)
    {
        $item1=Products::all();
        //2 create new recorde in mySql
        $item = Vorud::query()->create($request->only([
            'date',
            'TName',
            'PName',
        ]));
        //3 redirect to index
        return redirect()->route('Admin.Vorud.index',compact('item1'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Products=Products::all();
        $title = "مشاهده محصول ورودی";
        //1 get 1 record depends on id
        $item = Vorud::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.Vorudshow', compact('title','item',"Products"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products=Products::all();
        $Tamin=Tamin::all();
        $title = "ویرایش محصول ورودی";
        //1 get 1 record depends on id
        $item = Vorud::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.VorudAdd', compact('title','item','Products','Tamin'));
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(VorudRequest $request, string $id)
//    {
//        $item=$request->except('_token','_method');
//        $item = Vorud::query()->where('id', $id)->update($item);
//        //2 update specific recorde in mySql depends on id
//        $item3 = Vorud::query()->create($request->only([
//            'TotalPrice',
//            'TotalPrice2',
//            'Count',
//            'Count2',
//            'enterPrice',
//            'date',
//            'TName',
//            'PName'
//        ]));
//        $item5=Products::where('ProductComment', $item3->PName)->get('Price');
//        $item2=Products::where('ProductComment', $item3->PName)
//            ->update(['Price' => $item3->TotalPrice2 + $item5]);
//        $item4=Products::where('ProductComment', $item3->PName)
//            ->update(['Storage' => $item3->Count2]);
//        Vorud::query()->where('id', $id)->delete();
//        //3 redirect to index
//        return redirect()->route('Admin.Vorud.index',compact('item','item2','item4'));
//    }
    public function update(VorudRequest $request, string $id)
    {
        $item = $request->except('_token', '_method');
        Vorud::query()->where('id', $id)->update($item);

        $item3 = Vorud::query()->find($id);

        if ($item3) {
            $item2 = Products::where('ProductComment', $item3->PName)
                ->update(['Price' => $item3->TotalPrice2]);
            Products::where('ProductComment', $item3->PName)
                ->update(['Storage' => $item3->Count2]);
        }

        return redirect()->route('Admin.Vorud.index')->with(['item' => $item]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the record in Vorud table
        $item3 = Vorud::find($id);

        if ($item3) {
            // Get values before deletion
            $item5 = $item3->TotalPrice;
            $item4 = $item3->Count;
            if ($item5 !== null && $item4 !== null) {
                // Update Products table
                Products::where('ProductComment', $item3->PName)
                    ->decrement('Price', $item5);

                Products::where('ProductComment', $item3->PName)
                    ->decrement('Storage', $item4);
            }
        }

        // Delete the record from Vorud table
        Vorud::destroy($id);

        return redirect()->route('Admin.Vorud.index');
    }




    public function searchVorud(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        $products=Products::all();
        $Products=Products::all();
        $tamin=Tamin::all();
        // Search in the title and body columns from the posts table
        $items = Vorud::query()->orderByDesc('date')
            ->where('PName', 'LIKE', "%{$search}%")
            ->orWhere('TName', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->orWhere('TS', 'LIKE', "%{$search}%")
            ->paginate(10);
        $title="صفحه جست و جو";
        // Return the search view with the resluts compacted
        return view('Products.searchVorud', compact('items','title','products','tamin',"Products"));
    }
    public function filterVorud(Request $request)
    {
        $startDate = $request->input('date');
        $endDate = $request->input('date2');
        $items = Vorud::whereBetween('date', [$startDate, $endDate])->get();
        $products=Products::all();
        $Products=Products::all();
        $tamin=Tamin::all();
        $title="فیلتر شد";
        return view('Products.searchVorud', compact('items','title','products','tamin',"Products"));
    }
}
