<div>
    <!-- An unexamined life is not worth living. - Socrates -->
</div>

@extends('Admin.Panel')
@section($title, 'title')

@can('Cars')
    @section('ZPanel')
        <!-- Car Check Form -->
        <div class="row overflow-auto">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- Panel Body -->
                    <div class="panel-body">
                        @csrf <!-- CSRF Protection -->
                        <!-- Form Open -->
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.CarsCheck.update', $item->id))->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.CarsCheck.store'))->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <!-- Car Details -->
                            <tr>
                                <th scope="col">نام خودرو</th>
                                <td>{{ html()->text('CarName')->class('form-control')->id('CarName')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('CarName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">شماره پلاک خودرو</th>
                                <td>{{ html()->text('CarPlate')->class('form-control text-right')->id('CarPlate')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('CarPlate')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">رنگ خودرو</th>
                                <td>{{ html()->text('CarColor')->class('form-control')->id('CarColor')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('CarColor')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">نام راننده</th>
                                <td>{{ html()->text('DriverName')->class('form-control')->id('DriverName')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('DriverName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <!-- Check-in/Check-out Details -->
                            <tr>
                                <th scope="col">کیلومتر خروج</th>
                                <td>{{ html()->text('ExitDistance' . 'Km')->class('form-control')->id('ExitDistance')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('ExitDistance')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <!--  Time  -->
                            <tr>
                                <th scope="col">ساعت خروج اول</th>
                                <td>{{ html()->text('ExitTime1')->class('form-control')->id('ExitTime1')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('ExitTime1')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود اول</th>
                                <td>{{ html()->text('EnterTime1')->class('form-control')->id('EnterTime1')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('EnterTime1')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت خروج دوم</th>
                                <td>{{ html()->text('ExitTime2')->class('form-control')->id('ExitTime2')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('ExitTime2')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود دوم</th>
                                <td>{{ html()->text('EnterTime2')->class('form-control')->id('EnterTime2')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('EnterTime2')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت خروج سوم</th>
                                <td>{{ html()->text('ExitTime3')->class('form-control')->id('ExitTime3')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('ExitTime3')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود سوم</th>
                                <td>{{ html()->text('EnterTime3')->class('form-control')->id('EnterTime3')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('EnterTime3')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت خروج چهارم</th>
                                <td>{{ html()->text('ExitTime4')->class('form-control')->id('ExitTime4')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('ExitTime4')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">ساعت ورود چهارم</th>
                                <td>{{ html()->text('EnterTime4')->class('form-control')->id('EnterTime4')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('EnterTime4')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <!-- Enter kilometer -->
                            <tr>
                                <th scope="col">کیلومتر ورود</th>
                                <td>{{ html()->text('EnterDistance' . 'Km')->class('form-control')->id('EnterDistance')->isReadonly()->placeholder('ثبت نشده')}}</td>
                                @error('EnterDistance')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <!-- Form Submission Buttons -->
                            <tr>
                                <td colspan="2">
                                    <a href="{{url()->previous()}}" class="btn btn-danger">بازگشت</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- Form Close -->
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
