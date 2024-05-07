<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Models\Products;
use App\Models\Tamin;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Products=Products::all();
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $items = Link::query()->orderByDesc('id')
            ->where('PName', 'LIKE', "%{$search}%")
            ->paginate(15);
        $about = 'لینک سازی محصولات شما میتوانید در این صفحه محصولات را لینک سازی کنید و بعد در قسمت شاخص لینک شده آنها را استفاده کنید';
        $title = 'مدیریت لینک سازی ها';
        // Return the search view with the resluts compacted
        return view('Products.Links', compact('items', 'about', 'title','Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Products = Products::all();
        $title = "افزودن لینک";
        $about = 'افزودن لینک';
        //show create form
        return view('Products.LinksAdd', compact('title', 'about', "Products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkRequest $request)
    {
        //2 create new recorde in mySql
        $item = Link::query()->create($request->all());
        //3 redirect to index
        return redirect()->route('Admin.Links.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Products = Products::all();
        $title = "مشاهده لینک ها";
        $about = "شما میتوانید در این صفحه لینک سازی محصولات را مشاهده کنید";
        //1 get 1 record depends on id
        $item = Link::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.LinksShow', compact('title', 'item', 'about', "Products"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Products = Products::all();
        $title = "ویرایش شاخص";
        //1 get 1 record depends on id
        $item = Link::query()->findOrFail($id);
        //2 send data edit form
        return view('Products.LinksAdd', compact('title', 'item', "Products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LinkRequest $request, string $id)
    {
        $item = $request->all();
        //2 update specific recorde in mySql depends on id
        $item = Link::query()->where('id', $id)->update($item);
        $title = 'ویرایش شد';
        $about = 'ویرایش لینک ها';
        //3 redirect to index
        return redirect()->route('Admin.Links.index', compact('about', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //1 delete specific recorde in mySql depends on id
        Link::query()->where('id', $id)->delete();
        //2 redirect to index
        return redirect()->route('Admin.Links.index');
    }
}
