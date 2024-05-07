@extends('Admin.Panel')
@section($title,'title')
@can('Soal')
    @section('ZPanel')
        <div class="row overflow-auto mt-5 w-50">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.Soal.update', $item->id))->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.Soal.store'))->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                <th scope="col">سوال</th>
                                <td>{{ html()->textarea('Question')->class('form-control area')->id('Question')->placeholder('سوال')}}</td>
                                @error('Question')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <th scope="col">جواب</th>
                                <td>{{ html()->textarea('Answer')->class('form-control area')->id('Answer')->placeholder('جواب')}}</td>
                                @error('Answer')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                <td class="col-1">
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </td>
                                <td>
                                    <a href="{{route('Admin.Soal.index')}}">
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
