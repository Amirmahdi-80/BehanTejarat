<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarTransfer;
use App\Models\Driver;
use App\Models\Products;
use App\Models\Tamin;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request){
        $Products=Products::all();
        // Get the search value from the request
        $search = $request->input('search');
        $drivers=Driver::all();
        $cars=Car::all();
        // Search in the title and body columns from the posts table
        $items = CarTransfer::query()->orderByDesc('date')
            ->where('driver_id', 'LIKE', "%{$search}%")
            ->orWhere('car_id', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->paginate(1000);
        $Kil = CarTransfer::query()->orderByDesc('date')
            ->where('driver_id', 'LIKE', "%{$search}%")
            ->orWhere('car_id', 'LIKE', "%{$search}%")
            ->orWhere('date', 'LIKE', "%{$search}%")
            ->sum('Kilometer');
        $title="صفحه جست و جو";
        // Return the search view with the resluts compacted
        return view('Cars.search', compact('items','title','drivers','cars',"Products",'Kil','search'));
    }
    public function filter(Request $request)
    {
        $startDate = $request->input('date');
        $endDate = $request->input('date2');
        $items = CarTransfer::whereBetween('date', [$startDate, $endDate])->get();
        $drivers=Driver::all();
        $cars=Car::all();
        $title="فیلتر شد";
        return view('Cars.search', compact('items','title','drivers','cars'));
    }
}
