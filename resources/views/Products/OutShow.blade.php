@extends('Admin.Panel')

{{-- Section for setting the title --}}
@section($title, 'title')

{{-- Checking user's permission to edit products --}}
@can('edit-products')
    {{-- Section for displaying the panel content --}}
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- Panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        {{-- Table to display details of the product --}}
                        <table class="table text-center mt-5" dir="rtl">
                            <thead>
                            <tr>
                                {{-- Title row --}}
                                <th colspan="2" class="bg-info"> ریز جزئیات خروجی محصول {{ $item->PName }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Product details --}}
                            <tr class="text-center">
                                <th scope="col">تاریخ ثبت</th>
                                <td>{{ $item->TS }}</td>
                            </tr>
                            <tr>
                                <th scope="col">نام محصول</th>
                                <td>{{ $item->PName }}</td>
                            </tr>
                            <tr>
                                <th scope="col">نام تامین کننده</th>
                                <td>{{ $item->TName }}</td>
                            </tr>
                            <tr>
                                <th scope="col">تاریخ خروج محصول</th>
                                <td>{{ $item->date }}</td>
                            </tr>
                            <tr>
                                <th scope="col">قیمت خروجی</th>
                                <td dir="rtl">{{ number_format($item->exitPrice, 0, ".", ",") }} ريال </td>
                            </tr>
                            <tr>
                                <th scope="col">مقدار خروجی</th>
                                <td dir="rtl">{{ number_format($item->Count, 0, ".", ",") }}</td>
                            </tr>
                            <tr>
                                <th scope="col">قیمت کل خروجی</th>
                                <td dir="rtl">{{ number_format($item->TotalPrice, 0, ".", ",") }} ريال </td>
                            </tr>
                            <tr>
                                <th scope="col">قیمت کل انبار پس از خروج</th>
                                <td dir="rtl">{{ number_format($item->TotalPrice2, 0, ".", ",") }} ريال </td>
                            </tr>
                            <tr>
                                <th scope="col">موجودی کل انبار پس از خروج</th>
                                <td dir="rtl">{{ number_format($item->Count2, 0, ".", ",") }}</td>
                            </tr>
                            {{-- Return button --}}
                            <tr>
                                <td colspan="2">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-block mb-2">بازگشت</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
