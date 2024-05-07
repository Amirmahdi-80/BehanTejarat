@extends('Admin.Panel')
@section($title,'title')
@can('edit-aboutme')
    @section('ZPanel')
        <div class="row overflow-auto mt-5">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.AboutMe.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.AboutMe.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">نام</th>
                                <td>{{ html()->text('Name')->class('form-control')->id('Name')->placeholder('نام')}}</td>
                                @error('Name')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">نقش</th>
                                <td>{{ html()->text('Known')->class('form-control')->id('Known')->placeholder('نقش')}}</td>
                                @error('Known')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">رزومه</th>
                                <td>{{html()->file('Resume')->name('Resume')->id('Resume')->class('form-control-file')}}</td>
                                @error('Resume')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-success">ثبت اطلاعات</button></td>
                                <td>
                                    <a href="{{route('Admin.AboutMe.index')}}" class="btn btn-danger">بازگشت</a>
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
