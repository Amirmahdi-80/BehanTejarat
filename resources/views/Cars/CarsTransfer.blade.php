@extends('Admin.Panel')
@section($title,'title')
@section($about,'about')
@can('Cars')
    @section('ZPanel')
        <div class="row no-gutters">
            <div>
                <div class="panel panel-primary">
                    <div
                        class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Cars.png')}}" alt="خودروها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                        <p>{{$about}}</p>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center">
                        <span class="d-flex row justify-content-center align-items-center m-2" style="gap: 10px">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                class="material-icons">print</i></button>
                                <a href="{{route('Admin.search')}}"
                                   class="btn btn-info d-flex row justify-content-center align-items-center"><i
                                        class="material-icons ml-2">search</i> جست و جو</a>
                        </span>
                        <span id="printdivcontent">
                        <table class="table text-center table-responsive overflow-auto" dir="rtl">
                            <thead>
                            <a href="{{route('Admin.CarsTransfer.create')}}" class="btn btn-block btn-info">افزودن ورود
                                یا خروج<i class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <th scope="col">تاریخ</th>
                                <th scope="col">نام خودرو</th>
                                <th scope="col">نام راننده</th>
                                <th scope="col">ساعت خروج</th>
                                <th scope="col">کیلومتر پیموده</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col" class="Dis">عکس راننده</th>
                                <th scope="col" class="Dis">عکس خودرو</th>
                                <th scope="col">شماره پلاک خودرو</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">مشاهده جزئیات</th>
                                @can('edit-cars')
                                    <th scope="col">حذف</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                @foreach($items as $item)
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->car_id}}</td>
                                    <td>{{$item->driver_id}}</td>
                                    <td>{{$item -> exit1}}</td>
                                    <td dir="ltr">{{number_format($item->Kilometer,0,".",",")}} Km</td>
                                    <td>{{$item->Tozih}}</td>
                                    @foreach($drivers as $driver)
                                        @if($driver->DriverName == $item->driver_id)
                                            <td data-toggle="tooltip" data-placement="bottom"
                                                title="برای دانلود عکس کلیک کنید" class="Dis">
                                                @if(!$driver->image=="")
                                                    <a href="{{ route("files.show", $driver->image) }}"><img
                                                            class="avatar img-circle"
                                                            src="{{ route("files.show", $driver->image) }}"
                                                            alt="عکس راننده خودرو" title="عکس راننده خودرو"
                                                            style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                                @else
                                                    <span>خالی</span>
                                                @endif</td>
                                        @endif
                                    @endforeach
                                    @foreach($cars as $car)
                                        @if($car->CarName == $item->car_id)
                                            <td data-toggle="tooltip" data-placement="bottom"
                                                title="برای دانلود عکس کلیک کنید" class="Dis">
                                                @if(!$car->image=="")
                                                    <a href="{{ route("files.show", $car->image) }}"><img
                                                            class="avatar img-circle"
                                                            src="{{ route("files.show", $car->image) }}"
                                                            alt="عکس خودرو" title="عکس خودرو"
                                                            style="border-radius: 5px;width: 50px;
                                                               height: 50px;"></a>
                                                @else
                                                    <span>خالی</span>
                                                @endif</td>
                                            <td>{{$car->CarPlate}}</td>
                                        @endif
                                    @endforeach
                                    {{--                                    <td>{{$item2->ExitTime1}}</td>--}}
                                    {{--                                        <td><a href="{{ route('Admin.CarsTransfer.show', $item->id) }}" class="btn btn-info">--}}
                                    {{--                                                <i class="material-icons">remove_red_eye</i>--}}
                                    {{--                                            </a></td>--}}
                                    <td><a href="{{ route('Admin.CarsTransfer.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    @can('edit-cars')
                                        <td><a href="{{route('Admin.CarsTransfer.show', $item->id)}}"
                                               class="btn btn-sm btn-info"><i
                                                    class="material-icons">remove_red_eye</i></a></td>
                                        <td>
                                            {{ html()->form('DELETE', route('Admin.CarsTransfer.destroy', $item->id))->open() }}
                                            <button class="btn btn-sm btn-danger">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            {{ html()->form()->close() }}
                                        </td>
                                    @endcan
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                            </span>
                        <span dir="ltr" class="d-flex row justify-content-around align-items-center" style="gap: 10px"><a href="{{$items->previousPageUrl()}}" class="btn btn-light d-flex row justify-content-center align-items-center"><i
                                    class="material-icons text-dark">arrow_back</i>قبلی
                                </a>
                                <a href="{{$items->nextPageUrl()}}" class="btn btn-light d-flex row justify-content-around align-items-center">
                                    بعدی
                                    <i class="material-icons text-dark">arrow_forward</i>
                                </a>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
