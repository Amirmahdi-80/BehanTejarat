@extends('Admin.Panel')

@section($title, 'title')

@can('Cars')
    @section('ZPanel')
        <div class="container-fluid p-0">
            <div class="panel panel-primary">
                <div class="panel-heading clearfix d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/Search.png') }}" alt="جست و جو در خودرو ها" class="img2">
                    <h1 class="panel-title text-dark text-center mb-3 mt-2">{{ $title }}</h1>
                </div>

                <span class="d-flex flex-column justify-content-center align-items-center">
                    <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                            class="material-icons">print</i></button>
                    <label style="border-bottom: 2px dashed gray;width: 30%;color: #333" class="text-center pb-2">فیلتر بر اساس جست و جو</label>

                    <form action="{{ route('Admin.search') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                        <input type="text" name="search" class="text-dark" placeholder="جست و جو کنید">
                        <button type="submit"><i class="material-icons">search</i></button>
                    </form>

                    <label style="border-bottom: 2px dashed gray;width: 30%;color: #333" class="text-center pb-2">فیلتر بر اساس تاریخ</label>

                    <form action="{{ route('Admin.filter') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters No4">
                        <label>از تاریخ:</label>
                        <input type="text" name="date" class="text-dark date1">
                        <label>تا تاریخ:</label>
                        <input type="text" name="date2" class="text-dark date1">
                        <button type="submit"><i class="material-icons">filter_list</i></button>
                    </form>

                    <a href="{{ route('Admin.CarsTransfer.index') }}" class="btn btn-outline-danger mb-3">بازگشت</a>
                </span>

                <!-- panel body -->
                <div
                    class="panel-body d-flex flex-column justify-content-center align-items-center w-100 overflow-auto">
                    <div class="table-responsive" id="printdivcontent">
                        @if($items->isNotEmpty())
                            <table class="table mb-2">
                                <tr class="text-center">
                                    <th>
                                        کل مسافت طی شده گزارش
                                    </th>
                                    <th>
                                        تاریخ گزارش گیری
                                    </th>
                                    <th>
                                        خودرو های گزارش:
                                    </th>
                                </tr>
                                <tr class="text-center" dir="ltr">
                                    <td>
                                        {{ number_format($Kil, 0, ".", ",")}} Km
                                    </td>
                                    <td>
                                        {{jdate()}}
                                    </td>
                                    <td>
                                        @if($search === null)
                                            @foreach($cars as $car)
                                                {{ $car->CarName }}
                                                @if(!$loop->last)
                                                    {{-- Add comma after all but the last item --}}
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            {{$search}}
                                        @endif
                                    </td>

                                </tr>
                            </table>
                            @foreach ($items as $item)
                                <table class="table text-center table-responsive mb-2" dir="rtl"
                                       style="border-bottom: 3px solid #333">
                                    <thead class="bg-info">
                                    <tr>
                                        <th scope="col">تاریخ</th>
                                        <th scope="col">نام خودرو</th>
                                        <th scope="col">نام راننده</th>
                                        <th scope="col">توضیحات</th>
                                        <th scope="col">عکس راننده</th>
                                        <th scope="col">عکس خودرو</th>
                                        <th scope="col">شماره پلاک خودرو</th>
                                        <th scope="col">کیلومتر خروج</th>
                                        <th scope="col">کیلومتر ورود</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->car_id }}</td>
                                        <td>{{ $item->driver_id }}</td>
                                        <td>{{ $item->Tozih }}</td>
                                        @foreach($drivers as $driver)
                                            @if($driver->DriverName == $item->driver_id)
                                                <td data-toggle="tooltip" data-placement="bottom"
                                                    title="برای دانلود عکس کلیک کنید">
                                                    @if(!$driver->image == "")
                                                        <a href="{{ route('files.show', $driver->image) }}"><img
                                                                class="avatar img-circle"
                                                                src="{{ route('files.show', $driver->image) }}"
                                                                alt="عکس راننده خودرو" title="عکس راننده خودرو"
                                                                style="border-radius: 5px;width: 50px; height: 50px;"></a>
                                                    @else
                                                        <span>خالی</span>
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                        @foreach($cars as $car)
                                            @if($car->CarName == $item->car_id)
                                                <td data-toggle="tooltip" data-placement="bottom"
                                                    title="برای دانلود عکس کلیک کنید">
                                                    @if(!$car->image == "")
                                                        <a href="{{ route('files.show', $car->image) }}"><img
                                                                class="avatar img-circle"
                                                                src="{{ route('files.show', $car->image) }}"
                                                                alt="عکس خودرو" title="عکس خودرو"
                                                                style="border-radius: 5px;width: 50px; height: 50px;"></a>
                                                    @else
                                                        <span>خالی</span>
                                                    @endif
                                                </td>
                                                <td>{{ $car->CarPlate }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ number_format($item->ExitDistance, 0, ".", ",") . 'Km'}}</td>
                                        <td>{{ number_format($item->EnterDistance, 0, ".", ",") . 'Km'}}</td>
                                    </tr>
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th scope="col">ساعت خروج اول</th>
                                        <th scope="col">ساعت ورود اول</th>
                                        <th scope="col">ساعت خروج دوم</th>
                                        <th scope="col">ساعت ورود دوم</th>
                                        <th scope="col">ساعت خروج سوم</th>
                                        <th scope="col">ساعت ورود سوم</th>
                                        <th scope="col">ساعت خروج چهارم</th>
                                        <th scope="col">ساعت ورود چهارم</th>
                                        <th scope="col">کیلومتر پیموده</th>
                                    </tr>
                                    </thead>
                                    <tbody class="mb-3">
                                    <tr>
                                        <td>{{ $item->exit1 }}</td>
                                        <td>{{ $item->enter1 }}</td>
                                        <td>{{ $item->exit2 }}</td>
                                        <td>{{ $item->enter2 }}</td>
                                        <td>{{ $item->exit3 }}</td>
                                        <td>{{ $item->enter3 }}</td>
                                        <td>{{ $item->exit4 }}</td>
                                        <td>{{ $item->enter4 }}</td>
                                        <td>{{ number_format($item->kilometer, 0, ".", ",") . 'Km'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <div>
                                <h2 class="text-dark mt-5 d-flex row justify-content-center align-items-center"
                                    style="gap: 10px">نتیجه ای یافت نشد<i class="material-icons text-dark">mood_bad</i>
                                </h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
