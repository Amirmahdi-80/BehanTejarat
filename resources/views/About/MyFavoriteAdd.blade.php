@extends('Admin.Panel')
@section($title,'title')
@can('edit-favorite')
    @section('ZPanel')
        <div class="row overflow-auto mt-5">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Favorite.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Favorite.store'))->attribute('enctype="multipart/form-data"')->open() }}
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
                                <th scope="col">توضیح</th>
                                <td>{{ html()->textarea('Tozih')->class('form-control')->id('Tozih')->placeholder('توضیح')}}</td>
                                @error('Tozih')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">عکس</th>
                                <td>{{html()->file('Pic')->name('Pic')->id('Pic')->class('form-control-file')}}</td>
                                @error('Pic')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-success">ثبت علاقه مندی</button></td>
                                <td>
                                    <a href="{{route('Admin.Favorite.index')}}" class="btn btn-danger">بازگشت</a>
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
