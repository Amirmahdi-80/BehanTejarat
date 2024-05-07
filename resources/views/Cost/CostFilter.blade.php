@extends('Admin.Panel')

@section($title, 'title')
@section($about, 'about')

@can('edit-cost')
    @section('ZPanel')
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Search.png')}}" alt="جست و جو در هزینه ها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-3 mt-2">{{ $title }}</h1>
                    </div>
                    <span class="d-flex flex-column justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i
                                class="material-icons">print</i></button>
                        <label style="border-bottom: 2px dashed gray;width: 30%;color: #333"
                               class="text-center pb-2">فیلتر بر اساس جست و جو</label>
                        <form action="{{ route('Admin.searchcost') }}" method="GET"
                              class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                            <input type="text" name="search" class="text-dark" placeholder="جست و جو کنید">
                            <button type="submit"><i class="material-icons">search</i></button>
                        </form>
                        <label style="border-bottom: 2px dashed gray;width: 30%;color: #333"
                               class="text-center pb-2">فیلتر بر اساس تاریخ</label>
                        <form action="{{ route('Admin.filtercost') }}" method="GET"
                              class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters No4">
                            <label>از تاریخ:</label>
                            <input type="text" name="date" class="text-dark date1">
                            <label>تا تاریخ:</label>
                            <input type="text" name="date2" class="text-dark date1">
                            <button type="submit"><i class="material-icons">filter_list</i></button>
                        </form>
                        <a href="{{route('Admin.cost.index')}}" class="btn btn-danger mb-2">بازگشت</a>
                    </span>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center w-100 overflow-auto"
                         id="printdivcontent">

                        @if($items->isNotEmpty())
                            <table class="table mb-2">
                                <tr class="text-center">
                                    <th>
                                        جمع کل مبلغ گزارش
                                    </th>
                                    <th>
                                        تاریخ گزارش گیری
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        {{ number_format($totalPriceKol, 0, ".", ",") }} ريال
                                    </td>
                                    <td>
                                        {{jdate()}}
                                    </td>
                                </tr>
                            </table>
                            @foreach ($items as $item)
                                <table class="table text-center table-responsive"
                                       style="border-bottom: 3px solid #333;margin-bottom: 10px !important;border-top: 2.5px dashed #333;"
                                       dir="rtl">
                                    <tr>
                                        <th scope="col" colspan="2">دسته هزینه:</th>
                                        <td colspan="2">{{$item->Group}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" colspan="2">نام هزینه</th>
                                        <td colspan="2">{{ $item->CarNam ?? $item->HaNam }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col" colspan="2">تاریخ ثبت</th>
                                        <td colspan="2">{{$item->date}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">شرح هزینه</th>
                                        <th scope="col">قیمت هزینه</th>
                                        <th scope="col">تاریخ هزینه</th>
                                    </tr>
                                    @foreach(range(1, 15) as $i)
                                        @if($item["Sharh$i"])
                                            <tr>
                                                <td scope="col">{{$i}}</td>
                                                <td scope="col">{{$item["Sharh$i"]}}</td>
                                                <td scope="col">{{ number_format($item["Price$i"], 0, ".", ",") }} ريال</td>
                                                <td scope="col">{{$item["date$i"]}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <th colspan="2">مبلغ کل</th>
                                        <td colspan="2" class="PK">{{ number_format($item->PriceKol, 0, ".", ",") }} ريال</td>
                                    </tr>
                                </table>
                            @endforeach
                        @else
                            <div>
                                <h2 class="text-dark mt-5 d-flex row justify-content-center align-items-center"
                                    style="gap: 10px">نتیجه ای یافت نشد<i class="material-icons text-dark">mood_bad</i>
                                </h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
