@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="flex-column d-flex overflow-auto mt-5 w-100">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body">
                        @csrf
                        <span class="d-flex justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info btn-block w-50 m-2"><i class="material-icons">print</i></button>
                            </span>
                        <div class="d-flex flex-column justify-content-center align-items-center w-100" id="printdivcontent">
                            <table class="table text-right w-50" dir="rtl">
                                <tbody>
                                <tr>
                                    <th scope="col">نام محصول</th>
                                    <td>
                                        {{html()->text()->class('form-control')->value($item->Product)->isReadonly()}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">تاریخ ثبت</th>
                                    <td>{{ html()->text()->class('form-control date1')->id('date')->placeholder('تاریخ ثبت')->value($item->date)->isReadonly()}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">تامین کننده</th>
                                    <td>
                                        {{html()->text()->class('form-control')->value($item->Tamin)->isReadonly()}}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">وزن کلی</th>
                                    <td>{{ html()->text()->class('form-control')->id('VaznKol')->placeholder('وزن کلی')->value($item->VaznKol)->isReadonly()}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table text-right table-borderless" dir="rtl">
                                <tbody>
                                <tr class="bg-info text-center">
                                    <th scope="col" class="text-light">ردیف</th>
                                    <th scope="col" class="text-light">نام محصول</th>
                                    <th scope="col" class="text-light">شناسه محصول</th>
                                    <th scope="col" class="text-light">تولید واقعی</th>
                                    <th scope="col" class="text-light">واحد</th>
                                    <th scope="col" class="text-light">شاخص(درصد)</th>
                                    <th scope="col" class="text-light">درصدآنالیز</th>
                                    <th scope="col" class="text-light">انحراف</th>
                                </tr>
                                <tr class="text-center">
                                    {{--ردیف--}}
                                    <td scope="col">1</td>
                                    {{--سلکت--}}
                                    <td scope="col">
                                        {{html()->text()->class('form-control')->value($item->Product1)->isReadonly()}}
                                    </td>
                                    {{--مقدار شاخص--}}
                                    <td scope="col">
                                        @foreach($Products as $Product)
                                            @if($item->Product1 == $Product->ProductComment)
                                                @if(!$Product->ProductId== "")
                                                    {{$Product->ProductId}}
                                                @else
                                                    0
                                                @endif

                                            @endif
                                        @endforeach
                                    </td>
                                    <td scope="col">{{html()->text()->class('form-control')->placeholder('تولید واقعی')->id('Tol1')->attribute('oninput="calculateAndPerformUpdates(1)"')->value($item->Tol1)->isReadonly()}}</td>
                                    <td scope="col">@foreach($Products as $Product)
                                            @if($item->Product1 == $Product->ProductComment)
                                                @if(!$Product->Vahed == "")
                                                    {{$Product->Vahed}}
                                                @else
                                                    0
                                                @endif
                                            @endif
                                        @endforeach</td>
                                    <td scope="col">
                                        @foreach($Products as $Product)
                                            @if($item->Product1 == $Product->ProductComment)
                                                @if(!$Product->Indicate == "")
                                                    {{html()->text()->class('form-control')->placeholder('شاخص')->id('Ind1')->isReadonly()->value($Product->Indicate)}}
                                                @else
                                                    {{html()->text()->class('form-control')->placeholder('شاخص')->id('Ind1')->isReadonly()->value(0)}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td scope="col">{{html()->text()->class('form-control')->placeholder('درصد آنالیز')->id('Anz1')->isReadonly()->value($item->Analyse1)}}</td>
                                    <td scope="col">{{html()->text()->class('form-control')->placeholder('درصد انحراف')->id('Dev1')->isReadonly()->value($item->Deviation1)}}</td>
                                </tr>
                                @for($i = 2; $i <= 20; $i++)
                                    @if(!$item->{"Product$i"} == "")
                                        <tr class="text-center">
                                            {{--ردیف--}}
                                            <td scope="col">{{$i}}</td>
                                            {{--سلکت--}}
                                            <td scope="col">
                                                {{html()->text()->class('form-control')->value($item->{"Product$i"})->isReadonly()}}
                                            </td>
                                            {{--مقدار شاخص--}}
                                            <td scope="col">
                                                @foreach($Products as $Product)
                                                    @if($item->{"Product$i"} == $Product->ProductComment)
                                                        @if(!$Product->ProductId== "")
                                                            {{$Product->ProductId}}
                                                        @else
                                                            0
                                                        @endif

                                                    @endif
                                                @endforeach
                                            </td>
                                            <td scope="col">{{html()->text()->class('form-control')->placeholder('تولید واقعی')->id("Tol$i")->attribute("oninput='calculateAndPerformUpdates($i)'")->isReadonly()->value($item->{"Tol$i"})}}</td>
                                            <td scope="col">@foreach($Products as $Product)
                                                    @if($item->{"Product$i"} == $Product->ProductComment)
                                                        @if(!$Product->Vahed == "")
                                                            {{$Product->Vahed}}
                                                        @else
                                                            0
                                                        @endif
                                                    @endif
                                                @endforeach</td>
                                            <td scope="col">
                                                @foreach($Products as $Product)
                                                    @if($item->{"Product$i"} == $Product->ProductComment)
                                                        @if(!$Product->Indicate == "")
                                                            {{html()->text()->class('form-control')->placeholder('شاخص')->id("Ind$i")->isReadonly()->value($Product->Indicate)}}
                                                        @else
                                                            {{html()->text()->class('form-control')->placeholder('شاخص')->id("Ind$i")->isReadonly()->value(0)}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td scope="col">{{html()->text()->class('form-control')->placeholder('درصد آنالیز')->id("Anz$i")->isReadonly()->value($item->{"Analyse$i"})}}</td>
                                            <td scope="col">{{html()->text()->class('form-control')->placeholder('درصد انحراف')->id("Dev$i")->isReadonly()->value($item->{"Deviation$i"})}}</td>
                                        </tr>
                                    @endif
                                @endfor
                                <tr class="text-center">
                                    {{--ردیف--}}
                                    <td scope="col" colspan="3">مجموع:</td>
                                    {{--سلکت--}}
                                    <td scope="col">
                                        {{html()->text()->class('form-control')->value($item->TolKol)->placeholder("مجموع تولید واقعی")->id("TolKol")->isReadonly()}}
                                    </td>
                                    {{--مقدار شاخص--}}
                                    <td scope="col">
                                        -
                                    </td>
                                    <td scope="col">{{html()->text()->class('form-control')->placeholder('مجموع شاخص')->id('ShKol')->isReadonly()->value($item->ShKol)}}</td>
                                    <td scope="col">{{html()->text()->class('form-control')->placeholder('مجموع آنالیز')->id('AnzKol')->isReadonly()->value($item->AnzKol)}}</td>
                                    <td scope="col">
                                        {{html()->text()->class('form-control')->placeholder('مجموع انحراف')->id('EnherafKol')->isReadonly()->value($item->EnherafKol)}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <span class="d-flex flex-column justify-content-center align-items-center w-100" style="gap: 20px">
                                <a href="{{url()->previous()}}" class="btn btn-danger btn-block w-50">بازگشت</a>
                            </span>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
