@extends('Admin.Panel')
@section($title,'title')
@section('ZPanel')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <div class="panel-title w-100 text-dark text-center">{{ $title }}</div>
                </div>
                <!-- panel body -->
                <div class="panel-body mt-5">
                    @csrf
                    {{ html()->model($item)->form('PATCH', route('Admin.RegUp.update',$item->id))->attribute('enctype="multipart/form-data"')->open() }}
                    <table class="table text-right" dir="rtl">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <td scope="row">{{$item -> id}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">نام</th>
                            <td>{{ html()->text('Firstname')->class('form-control')->id('Firstname')->placeholder('نام')}}
                                @error('Firstname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror</td>
                        </tr>
                        <tr>
                            <th scope="col">نام خانوادگی</th>
                            <td>{{ html()->text('Lastname')->class('form-control')->id('Lastname')->placeholder('نام خانوادگی') }}
                                @error('Lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror</td>
                        </tr>
                        <tr>
                            <th scope="col">ایمیل</th>
                            <td>{{ html()->text('email')->class('form-control')->id('email')->placeholder('ایمیل') }}
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror</td>
                        </tr>
                        <tr>
                            <th scope="col">عکس پروفایل</th>
                            <td>
                                <input type="file" name="avatar" id="avatar" class="hidden">
                                @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror</td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-success">ویرایش</button>
                            </td>
                            <td>
                                <a href="{{route('Admin.RegUp.index')}}" class="btn btn-danger">بازگشت</a>
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
