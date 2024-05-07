@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <table class="table text-center mt-5" dir="rtl">
                            <thead>
                            <tr>
                                <th colspan="2" class="bg-info"> ریز جزئیات ورودی محصول {{$item->PName }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <th scope="col">تاریخ ثبت</th>
                                    <td>{{$item -> TS}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">نام محصول</th>
                                    <td>{{$item -> PName}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">نام تامین کننده</th>
                                    <td>{{$item -> TName}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">تاریخ ورود محصول</th>
                                    <td>{{$item -> date}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">قیمت ورودی</th>
                                    <td dir="rtl">{{number_format($item -> enterPrice,0,".",",")}} ريال </td>
                                </tr>
                                <tr>
                                    <th scope="col">مقدار ورودی</th>
                                    <td dir="rtl">{{number_format($item -> Count,0,".",",")}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">قیمت کل ورودی</th>
                                    <td dir="rtl">{{number_format($item -> TotalPrice,0,".",",")}} ريال </td>
                                </tr>
                                <tr>
                                    <th scope="col">قیمت کل انبار پس از ورود</th>
                                    <td dir="rtl">{{number_format($item -> TotalPrice2,0,".",",")}} ريال </td>
                                </tr>
                                <tr>
                                    <th scope="col">موجودی کل انبار پس از ورود</th>
                                    <td dir="rtl">{{number_format($item -> Count2,0,".",",")}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="{{url()->previous()}}" class="btn btn-danger btn-block mb-2">بازگشت</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
