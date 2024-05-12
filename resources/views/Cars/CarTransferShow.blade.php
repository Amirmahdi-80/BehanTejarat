@extends('Admin.Panel')

@section($title, 'title') <!-- Title section -->
@section($about, 'about') <!-- About section -->

@can('Cars')
    @section('ZPanel')
        <!-- Print Button -->
        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2 mt-5"><i class="material-icons">print</i></button>

        <!-- Print Content -->
        <div class="row" id="printdivcontent">
            <div>
                <div class="panel panel-primary">
                    <!-- Panel Body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center">
                        <!-- Form Open -->
                        {{ html()->model($item)->form('PATCH', route('Admin.CarsTransfer.update', $item->id))->open() }}
                        <table class="table text-right table-borderless mt-5" dir="rtl">
                            <tbody>
                            <!-- Data Rows -->
                            <tr>
                                <th>تاریخ</th>
                                <td>{{$item->date}}</td>
                            </tr>
                            <!-- Car Name -->
                            <tr>
                                <th>نام خودرو</th>
                                <td>{{$item->car_id}}</td>
                            </tr>
                            <!-- Driver Name -->
                            <tr>
                                <th>نام راننده</th>
                                <td>
                                    @foreach($drivers as $driver)
                                        @if($item->driver_id == $driver->DriverName)
                                            {{$driver->DriverName}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <!-- Exit kilometer -->
                            <tr>
                                <th scope="col">کیلومتر خروج:</th>
                                <td>{{$item->ExitDistance}}</td>
                            </tr>
                            <!-- Time -->
                            <tr>
                                <th scope="col">ساعت خروج اول:</th>
                                <td>{{$item->exit1}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود اول:</th>
                                <td>{{$item->enter1}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت خروج دوم:</th>
                                <td>{{$item->exit2}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود دوم:</th>
                                <td>{{$item->enter2}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت خروج سوم:</th>
                                <td>{{$item->exit3}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود سوم:</th>
                                <td>{{$item->enter3}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت خروج چهارم:</th>
                                <td>{{$item->exit4}}</td>
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود چهارم:</th>
                                <td>{{$item->enter4}}</td>
                            </tr>
                            <!-- Enter kilometer -->
                            <tr>
                                <th scope="col">کیلومتر ورود:</th>
                                <td dir="ltr">{{$item->EnterDistance}} Km</td>
                            </tr>
                            <!-- Distance traveled -->
                            <tr>
                                <th scope="col">کیلومتر پیموده:</th>
                                <td dir="ltr">{{$item->Kilometer}} Km</td>
                            </tr>
                            <!-- Driver Picture -->
                            <tr>
                                <th scope="col">عکس راننده:</th>
                                @foreach($drivers as $driver)
                                    @if($driver->DriverName == $item->driver_id)
                                        <td data-toggle="tooltip" data-placement="bottom"
                                            title="برای دانلود عکس کلیک کنید">@if(!$driver->image=="")
                                                <a
                                                    href="{{ route("files.show", $driver->image) }}"><img
                                                        class="avatar img-circle"
                                                        src="{{ route("files.show", $driver->image) }}" alt="عکس راننده"
                                                        title="عکس راننده"
                                                        style="border-radius: 5px"></a>
                                            @else
                                                <span>خالی</span>
                                            @endif</td>
                                    @endif
                                @endforeach
                            </tr>
                            <!-- CarPicture -->
                            <tr>
                                <th scope="col">عکس خودرو:</th>
                                @foreach($cars as $car)
                                    @if($car->CarName == $item->car_id)
                                        <td data-toggle="tooltip" data-placement="bottom"
                                            title="برای دانلود عکس کلیک کنید">
                                            @if(!$car->image=="")
                                                <a
                                                    href="{{ route("files.show", $car->image) }}"><img
                                                        class="avatar img-circle"
                                                        src="{{ route("files.show", $car->image) }}" alt="عکس خودرو"
                                                        title="عکس خودرو"
                                                        style="border-radius: 5px"></a>
                                            @else
                                                <span>خالی</span>
                                            @endif
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                            <!-- Plate -->
                            <tr>
                                <th scope="col">پلاک خودرو:</th>
                                @foreach($cars as $car)
                                    @if($car->CarName == $item->car_id)
                                        <td>{{$car->CarPlate}}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <!-- Comments -->
                            <tr>
                                <th scope="col">توضیحات:</th>
                                <td>{{$item->Tozih}}</td>
                            </tr>
                            <!-- Buttons -->
                            <tr>
                                <td>
                                    <a href="{{url()->previous()}}">
                                        <button class="btn btn-danger" type="button">بازگشت</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="http://www.zg666gps.com/" class="btn btn-success">ردیابی</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- Form Close -->
                        {{html()->form()->close()}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
