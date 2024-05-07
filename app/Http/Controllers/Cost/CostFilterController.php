<?php

namespace App\Http\Controllers\Cost;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Cost;
use App\Models\Products;
use Illuminate\Http\Request;

class CostFilterController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $cars = Car::all();
        $items = Cost::query()->orderByDesc('date')
            ->where('CarNam', 'LIKE', "%{$search}%")
            ->orWhere('HaNam', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->orWhere('Group', 'LIKE', "%{$search}%")
            ->paginate(10);
        $totalPriceKol = Cost::query()->where('CarNam', 'LIKE', "%{$search}%")
            ->orWhere('HaNam', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->orWhere('Group', 'LIKE', "%{$search}%")->sum('PriceKol');
        $about = 'جست و جو شما با موفقیت انجام شد، اگر اطلاعاتی نمایش داده نشد بدین منظور است که داده ای یافت نشده است';
        $title = 'جست و جو کنید';
        $Products = Products::all();
        return view('Cost.CostFilter', compact('items', 'cars', 'about', 'title', 'Products', 'totalPriceKol'));
    }

    public function filter(Request $request)
    {
        $Products=Products::all();
        $startDate = $request->input('date');
        $endDate = $request->input('date2');
        $items = Cost::whereBetween('date', [$startDate, $endDate])->get();
        $cars = Car::all();
        $about = 'فیلتر شما با موفیت انجام شده است،اگر داده ای یافت نشده است بدین منظور است که داده ای یافت نشده است';
        $title='فیلتر کننده';
        return view('Cost.CostFilter', compact('items', 'cars', 'about','title',"Products"));
    }
}
