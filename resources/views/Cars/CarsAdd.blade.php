@extends('Admin.Panel')

{{-- Define section title --}}
@section('title', $title)

{{-- Check user authorization for Cars --}}
@can('Cars')
    {{-- Cars section --}}
    @section('ZPanel')
        <div class="row overflow-auto mt-5">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        {{-- CSRF Token --}}
                        @csrf
                        {{-- Form opening --}}
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Cars.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Cars.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        {{-- Form table --}}
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            {{-- Car Name --}}
                            <tr>
                                <th scope="col">نام خودرو</th>
                                <td>{{ html()->text('CarName')->class('form-control')->id('CarName')->placeholder('نام خودرو')}}</td>
                                @error('CarName')
                                <td><span class="text-danger">{{$message}}</span></td>
                                @enderror
                            </tr>
                            {{-- Car Plate --}}
                            <tr>
                                <th scope="col">شماره پلاک خودرو</th>
                                <td>{{ html()->text('CarPlate')->class('form-control text-right')->id('CarPlate')->placeholder('شماره پلاک خودرو')}}</td>
                                @error('CarPlate')
                                <td><span class="text-danger">{{$message}}</span></td>
                                @enderror
                            </tr>
                            {{-- Car Color --}}
                            <tr>
                                <th scope="col">رنگ خودرو</th>
                                <td>{{ html()->text('CarColor')->class('form-control')->id('CarColor')->placeholder('رنگ خودرو')}}</td>
                                @error('CarColor')
                                <td><span class="text-danger">{{$message}}</span></td>
                                @enderror
                            </tr>
                            {{-- Car Kilometer --}}
                            <tr>
                                <th scope="col">کارکرد خودرو</th>
                                <td>{{ html()->text('Kilometer')->class('form-control')->id('Kilometer')->placeholder('کارکرد خودرو')}}</td>
                                @error('Kilometer')
                                <td><span class="text-danger">{{$message}}</span></td>
                                @enderror
                            </tr>
                            {{-- Car Image --}}
                            <tr>
                                <th scope="col">عکس</th>
                                <td>{{html()->file('image')->name('image')->id('image')->class('form-control-file')}}</td>
                                @error('image')
                                <td><span class="text-danger">{{ $message }}</span></td>
                                @enderror
                            </tr>
                            {{-- Bime Sales Images --}}
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
                            {{-- CarCard Images --}}
                            <tr>
                                <th scope="col">کارت خودرو</th>
                                <td>
                                    {{html()->file('CarCard')->name('CarCard')->id('CarCard')->class('form-control-file')}}
                                    @error('CarCard')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            {{-- BargSabz Images --}}
                            <tr>
                                <th scope="col">برگه سبز</th>
                                <td>
                                    {{html()->file('BargSabz')->name('BargSabz')->id('BargSabz')->class('form-control-file')}}
                                    @error('BargSabz')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            {{-- Car Insurance Images --}}
                            <tr>
                                <th scope="col">بیمه بدنه</th>
                                <td>
                                    {{html()->file('Badane')->name('Badane')->id('Badane')->class('form-control-file')}}
                                    @error('Badane')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            {{-- Submit and Cancel Buttons --}}
                            <tr>
                                <td><button type="submit" class="btn btn-success">ثبت</button></td>
                                <td>
                                    <a href="{{route('Admin.Cars.index')}}">
                                        <button class="btn btn-danger" type="button">بازگشت</button>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        {{-- Form closing --}}
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
