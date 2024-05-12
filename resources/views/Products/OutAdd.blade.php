@extends('Admin.Panel')

@section($title,'title')

@can('edit-products')
    @section('ZPanel')
        <div class="row overflow-auto mt-5">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- Panel body -->
                    <div class="panel-body">
                        @csrf
                        @if(isset($item))
                            {{-- Editing existing item --}}
                            {{ html()->model($item)->form('PATCH', route('Admin.Out.update', $item->id))->attribute('enctype="multipart/form-data"')->open() }}
                        @else
                            {{-- Creating new item --}}
                            {{ html()->form('POST', route('Admin.Out.store'))->attribute('enctype="multipart/form-data"')->open() }}
                        @endif
                        <table class="table text-right table-borderless" dir="rtl">
                            <tbody>
                            <tr>
                                @if(isset($item))
                                    <th scope="col">نام محصول</th>
                                    <td>{{html()->text('PName')->class('form-control')->value($item->PName)->isReadonly()}}</td>
                                @else
                                    <th scope="col">انتخاب محصول</th>
                                    @if($Products->isNotEmpty())
                                        <td>
                                            {{-- Selecting product --}}
                                            {{html()->select('PName')->class('form-select')->open()}}
                                            @foreach($Products as $product)
                                                {{html()->option($product->ProductComment)->value($product->ProductComment)}}
                                            @endforeach
                                            {{html()->select()->close()}}
                                        </td>
                                    @else
                                        {{-- No products available --}}
                                        <td>
                                            {{html()->text()->class('form-control border-1 border-danger text-danger')->value('لطفا ابتدا محصول وارد کنید')->disabled()}}
                                        </td>
                                    @endif
                                @endif
                                @error('PName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                @if(isset($item))
                                    <th scope="col">نام تامین کننده</th>
                                    <td>{{html()->text('TName')->class('form-control')->value($item->TName)->isReadonly()}}</td>
                                @else
                                    <th scope="col">انتخاب تامین کننده</th>
                                    @if($Tamin->isNotEmpty())
                                        <td>
                                            {{-- Selecting supplier --}}
                                            {{html()->select('TName')->class('form-select')->open()}}
                                            @foreach($Tamin as $tamin)
                                                {{html()->option($tamin->TaminName)->value($tamin->TaminName)}}
                                            @endforeach
                                            {{html()->select()->close()}}
                                        </td>
                                    @else
                                        {{-- No suppliers available --}}
                                        <td class="">
                                            {{html()->text()->class('form-control border-1 border-danger text-danger')->value('لطفا ابتدا تامین کننده وارد کنید')->disabled()}}
                                        </td>
                                    @endif
                                @endif
                                @error('TName')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            <tr>
                                {{-- Date of exit --}}
                                <th scope="col">تاریخ خروج</th>
                                <td>{{ html()->text('date')->class('form-control date1')->id('date')->placeholder('تاریخ خروج')->attribute('autocomplete','off')}}</td>
                                @error('date')
                                <td>
                                    <span class="text-danger">{{$message}}</span>
                                </td>
                                @enderror
                            </tr>
                            @if(isset($item))
                                <tr>
                                    {{-- Exit price --}}
                                    <th scope="col">قیمت خروجی</th>
                                    <td>{{ html()->text('exitPrice')->class('form-control')->id('exitPrice')->placeholder('قیمت خروج')->attribute("oninput=javascript:FormatNumber('exitPrice','exitPrice1');")}}</td>
                                    @error('enterPrice')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                <tr>
                                    {{-- Sorted exit price --}}
                                    <th scope="col">مرتب شده قیمت خروجی</th>
                                    <td>{{ html()->text()->class('form-control')->id('exitPrice1')->placeholder('مرتب شده قیمت خروجی')->isReadonly()}}</td>
                                </tr>
                                <tr>
                                    {{-- Exit quantity --}}
                                    <th scope="col">مقدار خروجی</th>
                                    <td>{{ html()->text('Count')->class('form-control')->id('Count')->placeholder('مقدار خروجی')->attribute('onkeyup="ca2()"')}}</td>
                                    @error('Count')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                <tr>
                                    {{-- Total exit price --}}
                                    <th scope="col">قیمت کل خروجی</th>
                                    <td>{{html()->text('TotalPrice')->class('form-control')->id('TotalPrice')->placeholder('قیمت کل خروجی')->isReadonly()}}</td>
                                    @error('TotalPrice')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                @foreach($Products as $product)
                                    {{-- Display storage quantity and price for selected product --}}
                                    @if($product->ProductComment == $item->PName)
                                        <tr>
                                            <th scope="col">مقدار موجود در انبار</th>
                                            <td>{{ html()->text()->class('form-control')->id('Count1')->placeholder('مقدار موجود در انبار')->value($product->Storage)->isReadonly()}}</td>
                                        <tr>
                                            <th scope="col">قیمت موجود در انبار</th>
                                            <td>{{ html()->text()->class('form-control')->id('Price1')->placeholder('قیمت موجود در انبار')->value($product->Price)->isReadonly()}}</td>
                                        </tr>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    {{-- Total quantity with storage consideration --}}
                                    <th scope="col">مقدار کل با احتساب انبار</th>
                                    <td>{{ html()->text('Count2')->class('form-control')->id('Count2')->placeholder('مقدار کل با احتساب انبار')->isReadonly()}}</td>
                                    @error('Count2')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                                <tr>
                                    {{-- Total price with storage consideration --}}
                                    <th scope="col">قیمت کل با احتساب انبار</th>
                                    <td>{{ html()->text('TotalPrice2')->class('form-control')->id('TotalPrice2')->placeholder('قیمت کل با احتساب انبار')->isReadonly()}}</td>
                                    @error('TotalPrice2')
                                    <td>
                                        <span class="text-danger">{{$message}}</span>
                                    </td>
                                    @enderror
                                </tr>
                            @endif
                            <tr>
                                {{-- Submit button --}}
                                @if($Tamin->isNotEmpty() && $Products->isNotEmpty())
                                    <td><button type="submit" class="btn btn-success">ثبت محصول</button></td>
                                @else
                                    {{-- Disable submit button if no products or suppliers available --}}
                                    <td><button type="button" class="btn btn-sm btn-warning disabled" style="font-size: 12px">ابتدا مقادیر خواسته شده را تکمیل کنید</button></td>
                                @endif
                                <td>
                                    {{-- Cancel button --}}
                                    <a href="{{route('Admin.Out.index')}}" class="btn btn-danger">بازگشت</a>
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
