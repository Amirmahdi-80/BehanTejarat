@extends('Admin.Panel')
@section('title', 'title') <!-- Assuming you want 'title' string as the title -->

@can('Cars')
    @section('ZPanel')
        <!-- Car Entry Form -->
        <div class="mt-5">
            <div class="panel panel-primary">
                <!-- Panel Body -->
                <div class="panel-body">
                    @csrf <!-- CSRF Protection -->
                    <!-- Form Open -->
                    @if(isset($item))
                        {{ html()->model($item)->form('PATCH', route('Admin.CarsTransfer.update', $item->id))->open() }}
                    @else
                        {{ html()->form('POST', route('Admin.CarsTransfer.store'))->open() }}
                    @endif
                    <table class="table text-right table-borderless" dir="rtl">
                        <tbody>
                        <!-- Date Field -->
                        <tr>
                            <th scope="col">تاریخ ثبت</th>
                            <td>{{ html()->text('date')->class('form-control date1')->id('date1')->placeholder('تاریخ ثبت')}}</td>
                            @error('date')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Car Name Selection -->
                        <tr>
                            <th><label for="نام خودرو">نام خودرو</label></th>
                            <td class="d-flex flex-column justify-content-center align-items-center">
                                @if($cars->isNotEmpty())
                                    {{ html()->select('car_id')->class('w-100')->open() }}
                                    @foreach($cars as $car)
                                        {{ html()->option($car->CarName)->value($car->CarName) }}
                                    @endforeach
                                    {{ html()->select()->close() }}
                                @else
                                    {{ html()->text()->value('لطفا ابتدا خودرو را اضافه کنید')->class('form-control text-danger border-danger')->disabled() }}
                                @endif
                                @error('car_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <!-- Driver Name Selection -->
                        <tr>
                            <th><label for="نام راننده">نام راننده</label></th>
                            <td class="d-flex flex-column justify-content-center align-items-center">
                                @if($drivers->isNotEmpty())
                                    {{ html()->select('driver_id')->class('w-100')->open() }}
                                    @if(isset($item))
                                        {{ html()->option($item->driver_id)->value($item->driver_id)->selected() }}
                                    @endif
                                    @foreach($drivers as $driver)
                                        {{ html()->option($driver->DriverName)->value($driver->DriverName) }}
                                    @endforeach
                                    {{ html()->select()->close() }}
                                @else
                                    {{ html()->text()->value('لطفا ابتدا راننده را اضافه کنید')->class('form-control text-danger border-danger')->disabled() }}
                                @endif
                                @error('driver_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <!-- Exit Kilometer -->
                        <tr>
                            <th scope="col">کیلومتر خروج</th>
                            <td>{{ html()->text('ExitDistance')->class('form-control')->id('ExitDistance')->placeholder('کیلومتر خروج')}}</td>
                            @error('ExitDistance')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Exit time 1 -->
                        <tr>
                            <th scope="col">ساعت خروج اول</th>
                            <td>{{ html()->text('exit1')->class('form-control')->id('exit1')->placeholder('ساعت خروج')}}</td>
                            @error('exit1')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Enter time 1 -->
                        <tr>
                            <th scope="col">ساعت ورود اول</th>
                            <td>{{ html()->text('enter1')->class('form-control')->id('enter1')->placeholder('ساعت ورود')}}</td>
                            @error('enter1')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Exit time 2 -->
                        <tr>
                            <th scope="col">ساعت خروج دوم</th>
                            <td>{{ html()->text('exit2')->class('form-control')->id('exit2')->placeholder('ساعت خروج')}}</td>
                            @error('exit2')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Enter time 2 -->
                        <tr>
                            <th scope="col">ساعت ورود دوم</th>
                            <td>{{ html()->text('enter2')->class('form-control')->id('enter2')->placeholder('ساعت ورود')}}</td>
                            @error('enter2')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Exit time 3 -->
                        <tr>
                            <th scope="col">ساعت خروج سوم</th>
                            <td>{{ html()->text('exit3')->class('form-control')->id('exit3')->placeholder('ساعت خروج')}}</td>
                            @error('exit3')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Enter time 3 -->
                        <tr>
                            <th scope="col">ساعت ورود سوم</th>
                            <td>{{ html()->text('enter3')->class('form-control')->id('enter3')->placeholder('ساعت ورود')}}</td>
                            @error('enter3')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Exit time 4 -->
                        <tr>
                            <th scope="col">ساعت خروج چهارم</th>
                            <td>{{ html()->text('exit4')->class('form-control')->id('exit4')->placeholder('ساعت خروج')}}</td>
                            @error('exit4')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Enter time 4 -->
                        <tr>
                            <th scope="col">ساعت ورود چهارم</th>
                            <td>{{ html()->text('enter4')->class('form-control')->id('enter4')->placeholder('ساعت ورود')}}</td>
                            @error('enter4')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Enter kilometer -->
                        <tr>
                            <th scope="col">کیلومتر ورود</th>
                            <td>{{ html()->text('EnterDistance')->class('form-control')->id('EnterDistance')->placeholder('کیلومتر ورود')->attribute('onchange=cal2()')}}</td>
                            @error('EnterDistance')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Distance traveled -->
                        <tr>
                            <th scope="col">کیلومتر پیموده</th>
                            <td>{{ html()->text('Kilometer')->class('form-control')->id('Kilometer')->placeholder('کیلومتر پیموده')->isReadonly()}}</td>
                            @error('Kilometer')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>
                        <!-- Comments -->
                        <tr>
                            <th scope="col">توضیحات</th>
                            <td>{{ html()->textarea('Tozih')->class('form-control')->id('Tozih')->placeholder('توضیحات')->style('resize:none;height:100px;font-size:10px')}}</td>
                            @error('Tozih')
                            <td>
                                <span class="text-danger">{{$message}}</span>
                            </td>
                            @enderror
                        </tr>

                        <!-- Form Submission Buttons -->
                        <tr>
                            <td>
                                @if($cars->isNotEmpty() && $drivers->isNotEmpty())
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                @else
                                    <button type="button" class="btn btn-success disabled" style="font-size: 10px">لطفا
                                        ابتدا مقادیر خواسته شده را تکمیل کنید
                                    </button>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('Admin.CarsTransfer.index')}}">
                                    <button class="btn btn-danger" type="button">بازگشت</button>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- Form Close -->
                    </form>{{ html()->form()->close() }}
                </div>
            </div>
        </div>
    @endsection
@endcan
