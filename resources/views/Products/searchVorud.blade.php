@extends('Admin.Panel')
@section($title,'title')
@can('edit-products')
    @section('ZPanel')
        <div class="row no-gutters">
            <div>
                <div class="panel panel-primary">
                    <div
                        class="panel-heading clearfix d-flex flex-column justify-content-center align-items-center">
                        <img src="{{asset('assets/images/Search.png')}}" alt="جست و جو در ورودی ها" class="img2">
                        <h1 class="panel-title text-dark text-center mb-3 mt-2">{{ $title }}</h1>
                    </div>
                    <span class="d-flex flex-column justify-content-center align-items-center">
                        <button type="button" onclick="PrintDiv();" value="Print" class="btn btn-info m-2"><i class="material-icons">print</i></button>
                        <label style="border-bottom: 2px dashed gray;width: 30%;color: #333" class="text-center pb-2 w-100">فیلتر بر اساس جست و جو</label>
                    <form action="{{ route('Admin.searchVorud') }}" method="GET"
                          class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters">
                        <input type="text" name="search" class="text-dark" placeholder="جست و جو کنید">
                        <button type="submit"><i class="material-icons">search</i></button>
                    </form>
                        <label style="border-bottom: 2px dashed gray;width: 30%;color: #333" class="text-center pb-2 w-100">فیلتر بر اساس تاریخ</label>
                        <form action="{{ route('Admin.filterVorud') }}" method="GET"
                              class="text-dark d-flex row justify-content-center align-items-center mb-4 search no-gutters No4">
                            <label>از تاریخ:</label>
                        <input type="text" name="date" class="text-dark date1">
                            <label>تا تاریخ:</label>
                            <input type="text" name="date2" class="text-dark date1">
                        <button type="submit"><i class="material-icons">filter_list</i></button>
                    </form>
                        <a href="{{route('Admin.Vorud.index')}}" class="btn btn-outline-danger mb-3">بازگشت</a>
                        </span>
                    <!-- panel body -->
                    <div class="panel-body d-flex flex-column justify-content-center align-items-center w-100 overflow-auto"
                         id="printdivcontent">
                        @if($items->isNotEmpty())

                                <table class="table text-center table-responsive" dir="rtl" style="border-bottom: 3px solid #333">
                                    <thead class="bg-info">
                                    @foreach ($items as $item)
                                    <tr>
                                        <th scope="col">تاریخ ثبت</th>
                                        <th scope="col">نام محصول</th>
                                        <th scope="col">نام تامین کننده</th>
                                        <th scope="col">تاریخ ورود</th>
                                        <th scope="col">قیمت ورودی</th>
                                        <th scope="col">مقدار ورودی</th>
                                        <th scope="col">قیمت کل ورودی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>{{$item -> TS}}</td>
                                        <td>{{$item -> PName}}</td>
                                        <td>{{$item -> TName}}</td>
                                        <td>{{$item -> date}}</td>
                                        <td>{{$item -> enterPrice}}</td>
                                        <td>{{$item -> Count}}</td>
                                        <td>{{$item -> TotalPrice}}</td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                    @else
                                        <div class="w-50">
                                            <h4 class="text-dark mt-5 d-flex row justify-content-center align-items-center bg-info p-3" style="gap: 10px;color: #ffffff !important;border-radius: 20px">نتیجه ای یافت نشد<i class="material-icons text-dark" style="color: #ffffff !important;">mood_bad</i></h4>
                                        </div>
                                </table>
                                @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
