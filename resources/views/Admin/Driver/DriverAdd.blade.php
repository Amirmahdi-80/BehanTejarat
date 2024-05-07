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
                            {{ html()->model($item)->form('PATCH', route('Admin.Driver.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Driver.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">نام  راننده</th>
                                <td>{{ html()->text('DriverName')->class('form-control')->id('DriverName')->placeholder('نام راننده')->attribute('autocomplete="off"')}}</td>
                                    @error('DriverName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                    @enderror
                            </tr>
                            <tr>
                                <th scope="col">کد ملی راننده</th>
                                <td>{{ html()->text('MeliCode')->class('form-control text-right')->id('MeliCode')->placeholder('کد ملی راننده')->attribute('autocomplete="off"')}}</td>
                                    @error('MeliCode')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                    @enderror
                            </tr>
                            <tr>
                                <th scope="col">شماره تماس راننده</th>
                                <td>{{ html()->text('DriverNumber')->class('form-control text-right')->id('DriverNumber')->placeholder('شماره تماس راننده')->attribute('autocomplete="off"')}}</td>
                                    @error('DriverNumber')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                    @enderror
                            </tr>
                            <tr>
                                <th scope="col">عکس</th>
                                <td>
                                    {{html()->file('image')->name('image')->id('image')->class('form-control-file')}}
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">عکس گواهینامه</th>
                                <td>
                                    {{html()->file('DriverLicence')->name('DriverLicence')->id('DriverLicence')->class('form-control-file')}}
                                    @error('DriverLicence')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-success">ثبت راننده</button></td>
                                <td>
                                    <a href="{{route('Admin.Driver.index')}}" class="btn btn-danger">بازگشت</a>
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
