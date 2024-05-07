@extends('Admin.Panel')
@section($title, 'title')
@can('edit-cost')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary mt-5">
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <h1 class="text-dark mb-5">{{$title}}</h1>
                        <table class="table text-center" dir="rtl">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2">دسته هزینه:</th>
                                <td colspan="2">{{$item->Group}}</td>
                            </tr>
                            <tr>
                                <th scope="col" colspan="2">نام هزینه</th>
                                <td colspan="2">{{$item->CarNam ?? $item->HaNam}}</td>
                            </tr>
                            <tr>
                                <th scope="col" colspan="2" style="border-bottom: 2px solid #0056b3">تاریخ ثبت</th>
                                <td colspan="2" style="border-bottom: 2px solid #0056b3">{{$item->date}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td scope="col">ردیف</td>
                                <td scope="col">شرح هزینه</td>
                                <td scope="col">قیمت هزینه</td>
                                <td scope="col">تاریخ هزینه</td>
                            </tr>
                            @for($i = 1; $i <= 15; $i++)
                                @if(!empty($item["Sharh{$i}"]))
                                    <tr>
                                        <td scope="col">{{$i}}</td>
                                        <td scope="col">{{$item["Sharh{$i}"]}}</td>
                                        <td scope="col" dir="rtl">{{number_format($item["Price{$i}"], 0, ".", ",")}} ريال </td>
                                        <td scope="col">{{$item["date{$i}"]}}</td>
                                    </tr>
                                @endif
                            @endfor
                            <tr>
                                <th colspan="2">مبلغ کل</th>
                                <td colspan="2" dir="rtl">{{number_format($item->PriceKol, 0, ".", ",")}} ريال </td>
                            </tr>
                            </tbody>
                            <tr>
                                <td colspan="4"><a href="{{url()->previous()}}" class="btn btn-danger btn-block mb-2">بازگشت</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
