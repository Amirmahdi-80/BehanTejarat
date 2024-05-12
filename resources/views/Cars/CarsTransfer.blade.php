@extends('Admin.Panel')
@section('title', $title)
@section('about', $about)
@can('Cars')
    @section('ZPanel')
        <!-- Cars Panel -->
        <div class="container-fluid p-0 mt-5">
            <div class="panel panel-primary">
                <!-- Panel Header -->
                <div class="panel-heading clearfix mb-4 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/Cars.png') }}" alt="خودروها" class="img-fluid">
                    <h1 class="panel-title text-dark text-center mb-5 mt-2">{{ $title }}</h1>
                    <p>{{ $about }}</p>
                </div>

                <!-- Panel Body -->
                <div class="panel-body">
                    <!-- Buttons -->
                    <span class="d-flex row justify-content-center align-items-center m-2" style="gap: 10px">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                class="material-icons">print</i></button>
                        <a href="{{ route('Admin.search') }}"
                           class="btn btn-info d-flex row justify-content-center align-items-center"><i
                                class="material-icons ml-2">search</i> جست و جو</a>
                    </span>

                    <!-- Table -->
                    <div class="table-responsive" id="printdivcontent">
                        <table class="table text-center table-responsive" dir="rtl">
                            <thead>
                            <!-- Add Car Button -->
                            <a href="{{ route('Admin.CarsTransfer.create') }}" class="btn btn-block btn-info">افزودن ورود
                                یا خروج<i class="material-icons">add_circle_outline</i></a>
                            <tr>
                                <!-- Table Headers -->
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
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <!-- Table Data -->
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->car_id }}</td>
                                    <td>{{ $item->driver_id }}</td>
                                    <td>{{ $item->exit1 }}</td>
                                    <td dir="ltr">{{ number_format($item->Kilometer, 0, ".", ",") }} Km</td>
                                    <td>{{ $item->Tozih }}</td>
                                    <td class="Dis">
                                        @foreach($drivers as $driver)
                                            <!-- Driver Image -->
                                            @if($driver->DriverName == $item->driver_id)
                                                @if(!$driver->image == "")
                                                    <a href="{{ route("files.show", $driver->image) }}"><img
                                                            class="avatar img-circle img-fluid"
                                                            src="{{ route("files.show", $driver->image) }}"
                                                            alt="عکس راننده خودرو" title="عکس راننده خودرو"
                                                            style="border-radius: 5px;"></a>
                                                @else
                                                    <span>خالی</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="Dis">
                                        @foreach($cars as $car)
                                            <!-- Car Image -->
                                            @if($car->CarName == $item->car_id)
                                                @if(!$car->image == "")
                                                    <a href="{{ route("files.show", $car->image) }}"><img
                                                            class="avatar img-circle img-fluid"
                                                            src="{{ route("files.show", $car->image) }}"
                                                            alt="عکس خودرو" title="عکس خودرو"
                                                            style="border-radius: 5px;"></a>
                                                @else
                                                    <span>خالی</span>
                                    @endif
                                    <td>{{ $car->CarPlate }}</td>
                                    @endif
                                    @endforeach
                                    </td>
                                    <!-- Edit Button -->
                                    <td><a href="{{ route('Admin.CarsTransfer.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="material-icons">edit</i>
                                        </a></td>
                                    @can('edit-cars')
                                        <!-- View and Delete Buttons -->
                                        <td><a href="{{ route('Admin.CarsTransfer.show', $item->id) }}"
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ $items->previousPageUrl() }}" class="btn btn-light">
                            <i class="material-icons">arrow_back</i> قبلی
                        </a>
                        <a href="{{ $items->nextPageUrl() }}" class="btn btn-light">
                            بعدی <i class="material-icons">arrow_forward</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
