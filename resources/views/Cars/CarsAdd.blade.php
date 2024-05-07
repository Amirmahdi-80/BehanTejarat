@extends('Admin.Panel')
@section($title,'title')
@can('Cars')
    @section('ZPanel')
        <div class="row overflow-auto mt-5">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Cars.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Cars.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">نام خودرو</th>
                                <td>{{ html()->text('CarName')->class('form-control')->id('CarName')->placeholder('نام خودرو')}}</td>
                                @error('CarName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">شماره پلاک خودرو</th>
                                <td>{{ html()->text('CarPlate')->class('form-control text-right')->id('CarPlate')->placeholder('شماره پلاک خودرو')}}</td>
                                @error('CarPlate')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">رنگ خودرو</th>
                                <td>{{ html()->text('CarColor')->class('form-control')->id('CarColor')->placeholder('رنگ خودرو')}}</td>
                                @error('CarColor')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">کارکرد خودرو</th>
                                <td>{{ html()->text('Kilometer')->class('form-control')->id('Kilometer')->placeholder('کارکرد خودرو')}}</td>
                                @error('Kilometer')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">عکس</th>
                                <td>{{html()->file('image')->name('image')->id('image')->class('form-control-file')}}</td>
                                @error('image')
                                <td>
                                    <span class="text-danger">{{ $message }}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">بیمه شخص ثالث</th>
                                <td>
                                    {{html()->file('BimeSales')->name('BimeSales')->id('BimeSales')->class('form-control-file')}}</td>
                                    @error('BimeSales')
                                <td>
                                    <span class="text-danger">{{ $message }}</span>
                                </td>
                                    @enderror

                            </tr>
                            <tr>
                                <th scope="col">کارت خودرو</th>
                                <td>
                                    {{html()->file('CarCard')->name('CarCard')->id('CarCard')->class('form-control-file')}}
                                    @error('CarCard')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">برگه سبز</th>
                                <td>
                                    {{html()->file('BargSabz')->name('BargSabz')->id('BargSabz')->class('form-control-file')}}
                                    @error('BargSabz')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">بیمه بدنه</th>
                                <td>
                                    {{html()->file('Badane')->name('Badane')->id('Badane')->class('form-control-file')}}
                                    @error('Badane')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </td>
                                <td>
                                    <a href="{{route('Admin.Cars.index')}}">
                                        <button class="btn btn-danger" type="button">بازگشت</button>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
