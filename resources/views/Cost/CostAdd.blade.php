@extends('Admin.Panel')

@section($title, 'title')

@can('edit-cost')
    @section('ZPanel')
        <div class="d-flex row justify-content-center align-items-center no-gutters w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{ html()->model($item)->form('PATCH', route('Admin.cost.update', $item->id))->attribute('autocomplete', 'off')->open() }}
                        @else
                            {{ html()->form('POST', route('Admin.cost.store'))->attribute('autocomplete', 'off')->open() }}
                        @endif
                        <table class="table text-center mt-5 overflow-auto" dir="rtl">
                            <thead>
                            <tr>
                                <th colspan="2">تاریخ ثبت</th>
                                <td colspan="3">
                                    {{ html()->text('date')->class('form-control date1')->id('date')->placeholder('تاریخ ثبت')->attribute('autocomplete', 'off') }}
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">گروه هزینه</th>
                                <td colspan="3">
                                    @if($Sorts->isNotEmpty())
                                        {{ html()->select('Group')->class('form-select')->attribute('onchange', 'Kho()')->id('Ha')->options($Sorts->pluck('SortName', 'SortName'), 'لطفا ابتدا دسته هزینه را وارد کنید')->placeholder('لطفا ابتدا دسته هزینه را وارد کنید') }}
                                    @else
                                        {{ html()->text()->value('لطفا ابتدا دسته هزینه را وارد کنید')->class('form-control border-danger text-danger')->disabled() }}
                                    @endif
                                    @error('Group')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr id="Kho">
                                <th colspan="2">نام خودرو</th>
                                <td colspan="3">
                                    {{ html()->select('CarNam')->class('form-select')->options($Cars->pluck('CarName', 'CarName'), 'انتخاب کنید')->placeholder('انتخاب کنید') }}
                                    @error('CarNam')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr id="Kho2">
                                <th colspan="2">نام هزینه</th>
                                <td colspan="3">
                                    {{ html()->text('HaNam')->class('form-control')->id('HaNam')->placeholder('نام هزینه')->attribute('autocomplete', 'off') }}
                                    @error('HaNam')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>ردیف</th>
                                <th>شرح هزینه</th>
                                <th>قیمت</th>
                                <th>مرتب شده قیمت</th>
                                <th>تاریخ</th>
                            </tr>
                            @for($i = 1; $i <= 15; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ html()->text("Sharh{$i}")->class('form-control')->id("Sharh{$i}")->placeholder('شرح هزینه')->attribute('autocomplete', 'off') }}</td>
                                    <td>{{ html()->text("Price{$i}")->class('form-control')->id("inputNumber{$i}")->placeholder('قیمت')->attribute('autocomplete', 'off')->attribute('oninput',"javascript:FormatNumber('inputNumber{$i}','formattedNumber{$i}');calc()") }}</td>
                                    <td>{{ html()->text()->class('form-control')->id("formattedNumber{$i}")->placeholder('مرتب شده قیمت')->isReadonly() }}</td>
                                    <td>{{ html()->text("date{$i}")->class('form-control date1')->id("date{$i}")->placeholder('تاریخ هزینه')->attribute('autocomplete', 'off') }}</td>
                                </tr>
                            @endfor
                            <tr>
                                <td colspan="2">
                                    @if($Sorts->isNotEmpty())
                                        <button type="submit" class="btn btn-success">اعمال</button>
                                    @else
                                        <button type="button" class="btn btn-success" disabled>ابتدا دسته هزینه را وارد کنید</button>
                                    @endif
                                    <a href="{{ route('Admin.cost.index') }}" class="btn btn-danger">بازگشت</a>
                                </td>
                                <td colspan="2"><span>قیمت کل:</span>{{ html()->text('PriceKol')->class('form-control')->id('PriceKol')->placeholder('قیمت کل')->isReadonly() }}</td>
                            </tr>
                            </thead>
                        </table>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
