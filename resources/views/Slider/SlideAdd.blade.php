@extends('Admin.Panel')
@section($title,'title')
@can('edit-slides')
    @section('ZPanel')
        <div class="row overflow-auto mt-5">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                            {{ html()->form('POST', route('Admin.Slider.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">نام اسلاید</th>
                                <td>{{ html()->text('SlideName')->class('form-control')->id('SlideName')->placeholder('نام اسلاید')}}</td>
                                @error('SlideName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">توضیح اسلاید</th>
                                <td>{{ html()->text('SlideTozih')->class('form-control')->id('SlideTozih')->placeholder('توضیح اسلاید')}}</td>
                                @error('SlideTozih')
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
                                <td>
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </td>
                                <td>
                                    <a href="{{route('Admin.Slider.index')}}">
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
