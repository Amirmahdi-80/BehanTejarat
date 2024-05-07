@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center col-12">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info mt-5"><i
                                class="material-icons">print</i></button>
                        <div
                            class="panel-body d-flex flex-column justify-content-center align-items-center w-100 overflow-auto"
                            id="printdivcontent">
                            <span class="dn">@foreach($Vorud as $vorud)
                                    {{$i += $vorud->enterPrice,0}} ريال
                                @endforeach</span>
                            <span class="dn">@foreach($Vorud as $vorud)
                                    {{$j += $vorud->Count,0}}
                                @endforeach</span>
                            <span class="dn">@foreach($Vorud as $vorud)
                                    {{$k += $vorud->TotalPrice,0}} ريال
                                @endforeach</span>
                            <table class="table text-center mt-2" dir="rtl" onloadstart="load3()">
                                <thead>
                                <tr>
                                    <th colspan="6" class="bg-info"> ریز جزئیات ورود
                                        محصول {{$item->ProductComment }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="col">نام تامین کننده</th>
                                    <th scope="col">تاریخ ورود محصول</th>
                                    <th scope="col">مبلغ</th>
                                    <th scope="col">مقدار</th>
                                    <th scope="col">مبلغ کل</th>
                                    <th scope="col">ریز جزئیات</th>
                                </tr>
                                @foreach($Vorud as $vorud)
                                    <tr>
                                        <td>{{$vorud -> TName}}</td>
                                        <td>{{$vorud -> date}}</td>
                                        <td dir="rtl" class="mab">{{number_format($vorud -> enterPrice,0,".",",")}}
                                            ريال
                                        </td>
                                        <td dir="rtl" class="meq">{{number_format($vorud -> Count,0,".",",")}}</td>
                                        <td dir="rtl" class="mabkol">{{number_format($vorud -> TotalPrice,0,".",",")}}
                                            ريال
                                        </td>
                                        <td><a href="{{ route('Admin.Vorud.show', $vorud->id) }}" class="btn btn-info">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"><a href="{{route('Admin.Products.index')}}"
                                                       class="btn btn-danger btn-block mb-2">بازگشت</a></td>
                                    <td>جمع مبلغ: {{number_format($i,0,".",",")}} ريال</td>
                                    <td>جمع مقدار: {{number_format($j)}}</td>
                                    <td>جمع مبلغ کل: {{number_format($k,0,".",",")}} ريال</td>
                                    <td>بهان تجارت آفرین</td>
                                </tr>
                                </tbody>
                            </table>
                            <span class="dn">@foreach($Out as $out)
                                    {{$i2 += $out->exitPrice,0}} ريال
                                @endforeach</span>
                            <span class="dn">@foreach($Out as $out)
                                    {{$j2 += $out->Count,0}}
                                @endforeach</span>
                            <span class="dn">@foreach($Out as $out)
                                    {{$k2 += $out->TotalPrice,0}} ريال
                                @endforeach</span>
                            <table class="table text-center mt-2" dir="rtl">
                                <thead>
                                <tr>
                                    <th colspan="6" class="bg-info"> ریز جزئیات خروج
                                        محصول {{$item->ProductComment }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="col">نام تامین کننده</th>
                                    <th scope="col">تاریخ خروج محصول</th>
                                    <th scope="col">مبلغ</th>
                                    <th scope="col">مقدار</th>
                                    <th scope="col">مبلغ کل</th>
                                    <th scope="col">ریز جزئیات</th>
                                </tr>
                                @foreach($Out as $out)
                                    <tr>
                                        <td>{{$out -> TName}}</td>
                                        <td>{{$out -> date}}</td>
                                        <td dir="rtl" class="mab">{{number_format($out -> exitPrice,0,".",",")}}
                                            ريال
                                        </td>
                                        <td dir="rtl" class="meq">{{number_format($out -> Count,0,".",",")}}</td>
                                        <td dir="rtl" class="mabkol">{{number_format($out -> TotalPrice,0,".",",")}}
                                            ريال
                                        </td>
                                        <td><a href="{{ route('Admin.Vorud.show', $out->id) }}" class="btn btn-info">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"><a href="{{route('Admin.Products.index')}}"
                                                       class="btn btn-danger btn-block mb-2">بازگشت</a></td>
                                    <td>جمع مبلغ: {{number_format($i2,0,".",",")}} ريال</td>
                                    <td>جمع مقدار: {{number_format($j2)}}</td>
                                    <td>جمع مبلغ کل: {{number_format($k2,0,".",",")}} ريال</td>
                                    <td>بهان تجارت آفرین</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table text-center">
                                <tr>
                                    <td colspan="2" class="bg-info">جزئیات انبار</td>
                                </tr>
                                <tr class="bg-info">
                                    <th>
                                        مبلغ انبار
                                    </th>
                                    <th>
                                        مقدار باقی مانده در انبار
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        @if(isset($out) && isset($vorud))
                                            {{ number_format(($out->TotalPrice - $vorud->TotalPrice), 0, ".", ",") }} ريال
                                        @elseif(isset($vorud) && !isset($out))
                                            {{ number_format($vorud->TotalPrice, 0, ".", ",") }} ريال
                                        @elseif(isset($out) && !isset($vorud))
                                            {{ number_format($out->TotalPrice, 0, ".", ",") }} ريال
                                        @else
                                            خالی
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($out) && isset($vorud))
                                            {{ number_format(($vorud->Count - $out->Count), 0, ".", ",") }}
                                        @elseif(isset($vorud) && !isset($out))
                                            {{ number_format($vorud->Count, 0, ".", ",") }}
                                        @elseif(isset($out) && !isset($vorud))
                                            {{ number_format($out->Count, 0, ".", ",") }}
                                        @else
                                            خالی
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
