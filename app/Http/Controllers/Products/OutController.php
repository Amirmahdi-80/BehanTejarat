<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutRequest;
use App\Models\Out;
use App\Models\Products;
use App\Models\Tamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all products for notifications
        $Products = Products::all();

        // Get items to paginate them in a table, ordered by TName
        $items = Out::query()->orderByDesc('TName')->paginate(10);

        // Description about the page
        $about = "شما در این صفحه میتوانید حواله محصول یا محصولات (خروجی) را تعریف کنید";

        // Page title
        $title = 'تعریف حواله(خروجی)';

        // Show the view and compact the data
        return view('Products.Out', compact('items', 'about', 'title', 'Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all products for notifications
        $Products = Products::all();

        // Get all providers for create
        $Tamin = Tamin::all();

        // Description about the page
        $about = "در این صفحه میتوانید حواله محصولات را اضافه کنید(خروجی)";

        // Page title
        $title = 'افزودن حواله محصول یا محصولات(خروجی)';

        // Show the view and compact the data
        return view('Products.OutAdd', compact('title', 'about', 'Tamin', 'Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutRequest $request)
    {
        // Get all products for notifications
        $item1 = Products::all();

        // Create a new record in MySQL
        $item = Out::query()->create($request->only([
            'date',
            'TName',
            'PName',
        ]));

        // Redirect to index
        return redirect()->route('Admin.Out.index', compact('item1'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get all products for notifications
        $Products = Products::all();

        // Get one record depends on id
        $item = Out::query()->findOrFail($id);

        // Page title
        $title = "مشاهده حواله محصول(خروجی)";

        // Send data to view
        return view('Products.OutShow', compact('title', 'item', 'Products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get all products for notifications
        $Products = Products::all();

        // Get all providers for create
        $Tamin = Tamin::all();

        // Page title
        $title = "ویرایش حواله محصول(خروجی)";

        // Get one record depends on id
        $item = Out::query()->findOrFail($id);

        // Send data to edit form
        return view('Products.OutAdd', compact('title', 'item', 'Products', 'Tamin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OutRequest $request, string $id)
    {
        // Get all the items except _token and _method
        $item = $request->except('_token', '_method');

        // Update the database via getting one record depends on id
        Out::query()->where('id', $id)->update($item);

        // Get the id for updating some information in the Products table
        $item3 = Out::query()->find($id);

        if ($item3) {
            // Update Price in Products table
            $item2 = Products::where('ProductComment', $item3->PName)
                ->update(['Price' => $item3->TotalPrice2]);

            // Update Storage in Products table
            Products::where('ProductComment', $item3->PName)
                ->update(['Storage' => $item3->Count2]);
        }

        // Send data and show the view from route
        return redirect()->route('Admin.Out.index')->with(['item' => $item]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Get one record depends on id
        $item3 = Out::query()->find($id);

        if ($item3) {
            // Update Price and Storage in Products table by deleting
            $item5 = $item3->TotalPrice;
            $item4 = $item3->Count;

            // Retrieve the product based on the ProductComment value
            $product = Products::where('ProductComment', $item3->PName)->first();

            if ($product && $item5 !== null && $item4 !== null) {
                // Update the 'Price' column by adding the value of $item5
                // Update the 'Storage' column by adding the value of $item4
                $product->update([
                    'Price' => DB::raw('Price + ' . $item5),
                    'Storage' => DB::raw('Storage + ' . $item4),
                ]);
            }

        }

        // Delete the Outed Product information
        Out::query()->where('id', $id)->delete();

        // Show the View from route
        return redirect()->route('Admin.Out.index');
    }


    public function searchOut(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        $products = Products::all();
        $Products = Products::all();
        $tamin = Tamin::all();

        // Search in the title and body columns from the posts table
        $items = Out::query()->orderByDesc('date')
            ->where('PName', 'LIKE', "%{$search}%")
            ->orWhere('TName', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->orWhere('TS', 'LIKE', "%{$search}%")
            ->paginate(10);

        // Set the title for the view
        $title = "صفحه جست و جو";

        // Return the search view with the results compacted
        return view('Products.searchOut', compact('items', 'title', 'products', 'tamin', "Products"));
    }

    public function filterOut(Request $request)
    {
        // Retrieve start and end dates from the request
        $startDate = $request->input('date');
        $endDate = $request->input('date2');

        // Retrieve items from the 'Out' model where the 'date' falls within the specified range
        $items = Out::whereBetween('date', [$startDate, $endDate])->get();

        // Retrieve all products
        $products = Products::all();

        // Duplicate variable assignment; retrieving all products again
        $Products = Products::all();

        // Retrieve all items from the 'Tamin' model
        $tamin = Tamin::all();

        // Set the title for the view
        $title = "فیلتر شد";

        // Return the view 'Products.searchOut' with the retrieved items, title, products, and tamin
        return view('Products.searchOut', compact('items', 'title', 'products', 'tamin', 'Products'));
    }

}
